<?php

namespace App\Providers;

use App\Http\View\Composers\SidebarViewComposer;
use App\Models\Settings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('partials._sidebar', SidebarViewComposer::class);

        View::share('darkmode', Settings::select('darkmode')->firstOrFail()->darkmode);
    }
}
