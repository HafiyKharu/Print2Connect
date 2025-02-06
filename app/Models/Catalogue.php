<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Catalogue extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'catalogueImages',
        'title',
        'description',
        'start',
        'end',
    ];

    public function getCatalogueImageAttribute($value)
    {
        return asset($value ? 'storage/' . $value : null);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}