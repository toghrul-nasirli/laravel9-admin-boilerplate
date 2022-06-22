<?php

namespace Database\Seeders;

use Database\Seeders\Post\PostCategorySeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            LocaleSeeder::class,
            SettingsSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PostCategorySeeder::class,
        ]);
    }
}
