<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $table = 'config';

    protected $fillable = [
        'logo',
        'favicon',
        'sitemap',
        'title',
        'email',
        'phone',
        'about',
        'description',
        'keywords',
    ];

    public $translatable = [
        'slug',
        'title',
        'about',
        'description',
        'keywords',
    ];
}
