<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /** @use HasFactory<\Database\Factories\FilmFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'poster',
        'status',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genres');
    }

    public $timestamps = false;
}
