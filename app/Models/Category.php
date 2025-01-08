<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'slugs',
        'status',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    protected function countPost(): Attribute
    {
        return Attribute::get(fn() => $this->posts()->count());
    }
}
