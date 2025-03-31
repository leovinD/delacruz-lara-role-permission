<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_name', 'cat_slug', 'cat_desc'
    ];

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'category_tag');
    }

    public function posts() : BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'category_post');
    }
}
