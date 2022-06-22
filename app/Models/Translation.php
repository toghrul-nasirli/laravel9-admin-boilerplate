<?php

namespace App\Models;

use App\Traits\CacheRemovable;
use Spatie\TranslationLoader\LanguageLine;

class Translation extends LanguageLine
{
    use CacheRemovable;
}
