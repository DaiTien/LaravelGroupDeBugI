<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $table = 'movies';
    protected $fillable
        = [
            'name',
            'title',
            'description',
            'year_manufacture',
            'content',
            'image',
            'video',
            'duration',
            'release_date',
            'director',
            'actors',
            'country',
            'movie_category_id',
            'status'
        ];

    public function moviecategory()
    {
        return $this->belongsTo(MovieCategory::class,'movie_category_id');
    }
    public function showTimes(){
        return $this->hasMany(ShowTime::class);
    }
}
