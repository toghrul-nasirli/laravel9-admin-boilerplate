<?php

namespace Database\Seeders\Post;

use App\Models\Post\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::factory(1)->create();
    }
}
