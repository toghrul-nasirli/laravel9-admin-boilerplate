<?php

namespace App\Services;

use App\Models\Locale;

class LocaleService extends BaseService
{
    public static function all()
    {
        return Locale::all();
    }
}