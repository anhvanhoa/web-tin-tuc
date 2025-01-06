<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'description',
        'slugs',
        'thumbnail',
        'user_id',
        'category_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
