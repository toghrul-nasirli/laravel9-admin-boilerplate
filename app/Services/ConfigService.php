<?php

namespace App\Services;

use App\Models\Config;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\URL;

class ConfigService
{
    public static function all()
    {
        return Config::first();
    }

    public static function getRobotsTxt()
    {
        $fileStream = fopen('robots.txt', 'r');
        $robots = fread($fileStream, filesize('robots.txt'));
        fclose($fileStream);
        
        return $robots;
    }

    public static function update($data)
    {
        $Config = Config::first();

        if (request()->logo) {
            _deleteFile('images/Config', $Config->logo);
            $data['logo'] = _storeImage('Config', $data['logo']);
        }

        if (request()->favicon) {
            _deleteFile('Config', $Config->favicon);
            $data['favicon'] = _storeImage('Config', $data['favicon']);
        }

        Config::first()->update($data);
    }

    public static function updateSeo($data)
    {
        $fileStream = fopen('robots.txt', 'w');
        fwrite($fileStream, $data['robots']);
        fclose($fileStream);

        Config::first()->update($data);
    }

    public static function updateSitemap()
    {
        $fileName = 'sitemap.xml';
        $path = 'sitemaps/';
        
        ini_set('memory_limit', '-1');
        set_time_limit(0);
        ini_set('max_execution_time', 0);
        ignore_user_abort(true);

        if (file_exists(storage_path('app/public/' . $path . $fileName))) {
            rename(storage_path('app/public/' . $path . $fileName), storage_path('app/public/' . $path . 'sitemap-old-' . date('Y-m-d H-i') . '.xml'));
        }

        SitemapGenerator::create(config('app.url') . '/' . 'en')
            ->getSitemap()
            ->add(Url::create('/ru'))
            ->writeToDisk('public', $path . $fileName);
    }

    public static function changeTheme()
    {
        $Config = Config::firstOrFail();
        $Config->darkmode ? $Config->darkmode = false : $Config->darkmode = true;
        $Config->save();
    }
}
