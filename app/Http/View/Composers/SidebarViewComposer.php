<?php

namespace App\Http\View\Composers;

use App\Services\LocaleService;
use Illuminate\View\View;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        $locales = LocaleService::all();

        $view->with('locales', $locales);
    }
}