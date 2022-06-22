<?php

namespace Database\Factories\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostCategoryFactory extends Factory
{
    private $num = 0;

    public function definition()
    {
        $this->num++;

        return [
            'position' => $this->num,
            'status' => $this->faker->boolean,
            'name' => $this->faker->unique()->word,
        ];
    }
}
