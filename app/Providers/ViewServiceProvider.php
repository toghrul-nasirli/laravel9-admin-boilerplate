<?php

namespace App\Providers;

use App\Models\Config;
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
        View::share('darkmode', Config::select('darkmode')->firstOrFail()->darkmode);
    }
}
