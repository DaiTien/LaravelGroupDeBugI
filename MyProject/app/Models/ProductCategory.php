<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $table = 'product_categories';
    protected $fillable = [
        'id', 'parent_id', 'name', 'description', 'tag', 'slug', 'icon', 'active'
    ];
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }
}
