<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\SettingsController;
use App\Http\Controllers\Web\UserController;

Route::get('settings', [SettingsController::class, 'index'])->name('settings');
Route::patch('settings/update', [SettingsController::class, 'update'])->name('settings.update');
Route::patch('settings/update-seo', [SettingsController::class, 'updateSeo'])->name('settings.update-seo');
Route::get('settings/update-sitemap', [SettingsController::class, 'updateSitemap'])->name('settings.update-sitemap');
Route::get('settings/change-theme', [SettingsController::class, 'changeTheme'])->name('settings.change-theme');

Route::resource('users', UserController::class)->except('show', 'destroy');
