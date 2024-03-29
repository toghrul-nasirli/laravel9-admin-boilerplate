<?php

namespace Database\Factories\Post;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    private $num = 0;
    private $imagePath = 'images/posts';
    private $imageWidth = 1280;
    private $imageHeight = 720;

    public function definition()
    {
        $this->num++;

        $uniqueWord = $this->faker->unique()->word;

        Storage::makeDirectory($this->imagePath);

        return [
            'position' => $this->num,
            'status' => $this->faker->boolean,
            'slug' => _slugify($uniqueWord),
            'category_id' => 1,
            'image' => $this->faker->unique()->image(storage_path('app/public/' . $this->imagePath), $this->imageWidth, $this->imageHeight, null, false),
            'title' => $uniqueWord,
            'text' => $this->faker->paragraph,
        ];
    }
}
