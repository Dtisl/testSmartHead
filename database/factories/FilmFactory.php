<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'poster' => $this->faker->imageUrl(),
            'status' => $this->faker->boolean,
        ];
    }
}
