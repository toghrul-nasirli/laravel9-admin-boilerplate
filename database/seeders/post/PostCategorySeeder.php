<?php

namespace Database\Seeders\Post;

use App\Models\Post\PostCategory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    public function run()
    {
        PostCategory::factory(3)->create();
    }
}
