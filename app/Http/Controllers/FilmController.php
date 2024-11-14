<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;
use App\Services\Film\FilmService;
use Illuminate\Http\JsonResponse;

class FilmController extends Controller
{
    private $service;

    public function __construct(FilmService $service)
    {
        $this->service = $service;
    }

    public function show(): JsonResponse
    {
        return response()->json($this->service->getFilmsPagine(), 200);
    }

    public function findOfId(int $id): JsonResponse
    {
        return response()->json($this->service->getFilmById($id), 200);
    }

    public function create(StoreFilmRequest $request): JsonResponse
    {
        return response()->json($this->service->createFilm($request), 201);
    }

    public function update(StoreFilmRequest $request, int $id): JsonResponse
    {
        return response()->json($this->service->updateFilm($request, $id), 200);
    }

    public function delete(int $id): JsonResponse
    {
        return response()->json($this->service->deleteFilm($id), 204);
    }

    public function publish(int $id): JsonResponse
    {
        return response()->json($this->service->publishFilm($id), 200);
    }
}
