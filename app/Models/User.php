<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\PostPrintRequest;
use App\Models\Catalogue;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',
        'username',
        'name',
        'email',
        'password',
        'description',
        'avatar',
        'banner'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return asset($value ? 'storage/'.$value : 'images/avatar.png');
        // return "https://i.pravatar.cc/150?u=".$this->email;
    }

    public function getBannerAttribute($value)
    {
        return asset($value ? 'storage/'.$value : 'images/banner1.jpg');
    }

    // public function setPasswordAttribute($value)
    // {
    //     $this->validated['password'] = (Hash::needsRehash($value)) ? bcrypt($value) : $value;
    // }
    public function timeline()
    {
        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);
    
        switch ($this->role) {
            case 'customer':
                return PostPrintRequest::whereIn('user_id', $ids)
                    ->with('user', 'comments.user')
                    ->latest()
                    ->paginate(50);
            case 'printshop':
                return Catalogue::whereIn('user_id', $ids)
                    ->latest()
                    ->paginate(50);
            default:
                return null;
        }
    }
    public function postPrintRequests()
    {
        return $this->hasMany(PostPrintRequest::class)->latest();
    }

    public function catalogues()
    {
        return $this->hasMany(Catalogue::class)->latest();
    }


    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);   
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function following(User $user)
    {
        return $this->follows()
        ->where('following_user_id', $user->id)
        ->exists();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
