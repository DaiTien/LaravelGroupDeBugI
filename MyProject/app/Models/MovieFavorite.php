<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieFavorite extends Model
{
    //
    protected $table = 'movie_favorites';
    protected $fillable
        = [
            'user_id',
            'movie_id',
            'status'
        ];
}
