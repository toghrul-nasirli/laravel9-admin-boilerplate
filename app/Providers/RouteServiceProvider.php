<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const ADMIN = '/az/users';
    public const EDITOR = '/az/posts';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::redirect('/', '/az');

            Route::prefix('{lang}')
                ->where(['lang' => '[a-zA-Z]{2}'])
                ->middleware('web')
                ->group(base_path('routes/web.php'));

            Route::prefix('{lang}')
                ->where(['lang' => '[a-zA-Z]{2}'])
                ->middleware('auth')
                ->namespace($this->namespace)
                ->group(base_path('routes/auth.php'));
        });
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
