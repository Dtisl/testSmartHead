<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FilmGenre>
 */
class FilmGenreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'film_id' => Film::all()->random()->id,
            'genre_id' => Genre::all()->random()->id,
        ];
    }
}
