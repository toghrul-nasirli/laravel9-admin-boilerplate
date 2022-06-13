<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'role_id' => 1,
            'username' => 'SUPER_ADMIN',
            'email' => 'super@admin.com',
            'password' => Hash::make('super_admin'),
        ]);
        User::create([
            'role_id' => 1,
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'role_id' => 2,
            'username' => 'editor',
            'email' => 'editor@editor.com',
            'password' => Hash::make('editor'),
        ]);
    }
}
