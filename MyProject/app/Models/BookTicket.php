<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookTicket extends Model
{
    //
    protected $table = 'book_tickets';
    protected $fillable =
        [
            'user_id',
            'movie_id',
            'show_time_id',
            'total_seat',
            'total_price',
            'discount',
            'status',
            'seats_id'
        ];
}
