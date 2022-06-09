<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        Config::create([
            'logo' => 'logo',
            'favicon' => 'favicon',
            'title' => 'title',
            'email' => 'example@email.com',
            'phone' => 'phone',
            'about' => 'about',
        ]);
    }
}
