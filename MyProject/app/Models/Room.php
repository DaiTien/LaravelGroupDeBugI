<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = 'rooms';
    protected $fillable
        = [
            'name',
            'total_seats',
            'status'
        ];

public function roomShowTimes(){
    return $this->hasMany(ShowTime::class);
}
}
