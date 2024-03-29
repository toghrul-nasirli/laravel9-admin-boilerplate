<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class GateServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Gate::define('superable', function (User $user) {
            return strtolower($user->role->name) == 'admin' && $user->id == 1;
        });
        Gate::define('adminable', function (User $user) {
            return strtolower($user->role->name) == 'admin';
        });
    }
}
