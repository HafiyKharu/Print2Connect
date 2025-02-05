<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintShops extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'businessRegNo',
        'address',
        'contactNo',
        'serviceDescription',
        'is_approved',
    ];

    /**
     * Get the user that owns the print shop.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}