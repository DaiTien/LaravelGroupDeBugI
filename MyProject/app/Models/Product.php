<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = [
        'category_id', 'name', 'introduce', 'detail', 'price', 'discount_percnet', 'image', 'garelly', 'featured','slug','active'
    ];
    public function categories()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id', 'id');
    }
}
