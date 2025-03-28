<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_name', 'tag_slug', 'tag_desc'
    ];

    public function categories() : BelongsToMany{
        return $this->belongsToMany(Category::class, 'category_tag');
    }
}