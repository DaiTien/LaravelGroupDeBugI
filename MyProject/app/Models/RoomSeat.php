<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomSeat extends Model
{
    //
    protected $table = 'room_seats';
    protected $fillable
        = [
            'name',
            'sroom_id',
            'type',
            'seat_number',
            'tatus'
        ];
}
