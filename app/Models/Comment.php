<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'postprintrequest_id',
        'user_id',
        'description',
    ];

    /**
     * Get the post print request that owns the comment.
     */
    public function postPrintRequest()
    {
        return $this->belongsTo(PostPrintRequest::class, 'postprintrequest_id');
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
