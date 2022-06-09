<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateSeoSettingsRequest;
use App\Http\Requests\Settings\UpdateSettingsRequest;
use App\Services\ConfigService;

class ConfigController extends Controller
{
    public function index()
    {
        $config = ConfigService::all();
        $robots = ConfigService::getRobotsTxt();

        return view('config.index', compact('config', 'robots'));
    }

    public function update(UpdateSettingsRequest $request)
    {
        ConfigService::update($request->validated());

        return back()->with('success', __('admin.saved'));
    }

    public function updateSeo(UpdateSeoSettingsRequest $request)
    {
        ConfigService::updateSeo($request->validated());

        return back()->with('success', __('admin.saved'));
    }

    public function updateSitemap()
    {
        ConfigService::updateSitemap();

        return back()->with('sitemap-success', __('admin.sitemap-updated'));
    }

    public function changeTheme()
    {
        ConfigService::changeTheme();

        return back();
    }
}
