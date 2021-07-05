<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceTicket extends Model
{
    //
    protected $table = 'price_tickets';
    protected $fillable = ['name','price'];
}
