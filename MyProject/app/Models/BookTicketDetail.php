<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookTicketDetail extends Model
{
    //
    protected $table = 'book_ticket_details';
    protected $fillable = [
        'user_id',
        'book_ticket_id',
        'type_price_id',
        'quantity',
        'price'
    ];
}
