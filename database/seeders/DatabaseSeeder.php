<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\FilmGenre;
use App\Models\Genre;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\FilmFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Film::factory(5)->create();
        Genre::factory(5)->create();
        FilmGenre::factory(5)->create();
    }
}
