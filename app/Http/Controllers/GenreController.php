<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Services\Genre\GenreService;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    private $service;

    public function __construct(GenreService $service)
    {
        $this->service = $service;
    }

    public function show(): JsonResponse
    {
        return response()->json($this->service->getGenres(), 200);
    }

    public function findOfId(int $id): JsonResponse
    {
        return response()->json($this->service->getGenreById($id), 200);
    }

    public function create(StoreGenreRequest $request): JsonResponse
    {
        return response()->json($this->service->createGenre($request), 201);
    }

    public function update(StoreGenreRequest $request, int $id): JsonResponse
    {
        return response()->json($this->service->updateGenre($request, $id), 200);
    }

    public function delete(int $id): JsonResponse
    {
        return response()->json($this->service->deleteGenre($id), 204);
    }
}
