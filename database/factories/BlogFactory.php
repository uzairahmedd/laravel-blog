<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'sub_title' => $this->faker->text(80),
            'body' => '<p>' . $this->faker->text(500) . '</p>',
            'user_id' => User::factory(),
        ];
    }
}
