<?php

namespace App\Services\Film;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class FilmService
{
    public function getFilmsPagine(): Collection
    {
        return Film::with('genres')->paginate(5);
    }

    public function getFilmById(int $id): Film
    {
        return $film = Film::with('genres')->findOrFail($id);
    }

    public function createFilm(StoreFilmRequest $request): Film
    {
        $film = Film::create([
            'title' => $request->title,
            'status' => false
        ]);

        if ($request->hasFile('poster')) {
            $film->poster = $request->file('poster')->store('posters');
        } else {
            $film->poster = 'default.jpg';
        }

        $film->save();
        $film->genres()->sync($request->genres);

        return $film;
    }

    public function updateFilm(StoreFilmRequest $request, int $id): Film
    {
        $film = Film::findOrFail($id);
        $film->title = $request->title;

        if ($request->hasFile('poster')) {
            $film->poster = $request->file('poster')->store('posters');
            Storage::delete($film->poster);
        }

        $film->save();
        $film->genres()->sync($request->genres);

        return $film;
    }

    public function deleteFilm(int $id)
    {
        $film = Film::findOrFail($id);
        if ($film->poster && $film->poster !== 'default.jpg') {
            Storage::delete($film->poster);
        }
        $film->delete();
    }

    public function publishFilm(int $id): Film
    {
        $film = Film::findOrFail($id);
        $film->status = true;
        $film->save();

        return $film;
    }
}
