<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\ConfigController;
use App\Http\Controllers\Web\UserController;

Route::get('config', [ConfigController::class, 'index'])->name('config');
Route::patch('config/update', [ConfigController::class, 'update'])->name('config.update');
Route::patch('config/update-seo', [ConfigController::class, 'updateSeo'])->name('config.update-seo');
Route::get('config/update-sitemap', [ConfigController::class, 'updateSitemap'])->name('config.update-sitemap');
Route::get('config/change-theme', [ConfigController::class, 'changeTheme'])->name('config.change-theme');

Route::resource('users', UserController::class)->except('show', 'destroy');
