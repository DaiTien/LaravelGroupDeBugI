<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    //
    protected $table = 'show_times';
    protected $fillable = ['show_date', 'time_start', 'time_end', 'movie_id', 'room_id', 'status'];
}
