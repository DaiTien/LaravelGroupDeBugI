<?php

namespace App\Models;

use App\User;
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

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
