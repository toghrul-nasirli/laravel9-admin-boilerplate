<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'position',
        'slug',
        'category_id',
        'image',
        'title',
        'text',
        'description',
        'keywords',
    ];

    public $translatable = [
        'slug',
        'title',
        'text',
        'description',
        'keywords',
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }
}
