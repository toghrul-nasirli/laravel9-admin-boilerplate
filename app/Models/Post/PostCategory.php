<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'slug',
        'name',
    ];

    public $translatable = [
        'slug',
        'name',
    ];
}
