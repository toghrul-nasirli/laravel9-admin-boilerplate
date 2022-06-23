<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\SettingsController;
use App\Http\Controllers\Web\TranslationController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\Post\PostController;
use App\Http\Controllers\Web\Post\PostCategoryController;

Route::controller(SettingsController::class)->prefix('settings')->name('settings.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::patch('update', 'update')->name('update');
    Route::patch('update-seo', 'updateSeo')->name('update-seo');
    Route::get('update-sitemap', 'updateSitemap')->name('update-sitemap');
    Route::get('change-theme', 'changeTheme')->name('change-theme');
});

Route::controller(TranslationController::class)->prefix('translations')->name('translations.')->group(function () {
    Route::get('{group}', 'index')->name('index');
    Route::get('{group}/create', 'create')->name('create');
    Route::post('{group}', 'store')->name('store');
    Route::get('{translation}/edit', 'edit')->name('edit');
    Route::patch('{translation}', 'update')->name('update');
});

Route::resource('users', UserController::class)->except('show', 'destroy');
Route::resource('posts', PostController::class)->except('show', 'destroy');
Route::resource('post-categories', PostCategoryController::class)->except('show', 'destroy');
