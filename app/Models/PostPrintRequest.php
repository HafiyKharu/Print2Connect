<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostPrintRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'printType',
        'description',
        'quantity',
        'deadline',
        'status',
    ];

    public function getCatalogueImageAttribute($value)
    {
        return asset($value ? 'storage/catalogue'.$value : null);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'postprintrequest_id');
    }

    /**
     * Get the user that owns the post print request.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
