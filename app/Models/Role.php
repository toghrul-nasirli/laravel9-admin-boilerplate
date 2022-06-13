<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
    ];

    public $translatable = [
        'name',
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
