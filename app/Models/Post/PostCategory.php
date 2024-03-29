<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PostCategory extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'position',
        'slug',
        'name',
    ];

    public $translatable = [
        'slug',
        'name',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
