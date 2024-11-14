<?php

namespace App\Services\Genre;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class GenreService
{
    public function getGenres(): Collection
    {
        $genres = Genre::all();
        return $genres;
    }

    public function getGenreById(int $id): LengthAwarePaginator
    {
        $genre = Genre::findOrFail($id);

        return $genre->films()->paginate(5);
    }

    public function createGenre($request): Genre
    {
        $genre = new Genre();
        $genre->fill($request->all());
        $genre->save();

        return $genre;
    }

    public function updateGenre($request, int $id): Genre
    {
        $genre = Genre::findOrFail($id);
        $genre->fill($request->all());
        $genre->save();

        return $genre;
    }

    public function deleteGenre(int $id): Void
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
    }
}
