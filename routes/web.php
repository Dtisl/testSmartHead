<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::prefix('films')->group(function () {
    Route::get('/', [FilmController::class, 'show']);
    Route::post('/', [FilmController::class, 'create']);
    Route::get('{id}', [FilmController::class, 'findOfId']);
    Route::patch('{id}', [FilmController::class, 'update']);
    Route::delete('{id}', [FilmController::class, 'delete']);
    Route::post('{id}/publish', [FilmController::class, 'publish']);
});

Route::prefix('genres')->group(function () {
    Route::get('/', [GenreController::class, 'show']);
    Route::post('/', [GenreController::class, 'create']);
    Route::get('{id}', [GenreController::class, 'findOfId']);
    Route::patch('{id}', [GenreController::class, 'update']);
    Route::delete('{id}', [GenreController::class, 'delete']);
});
