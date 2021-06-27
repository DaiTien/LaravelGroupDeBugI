<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $fillable = [
        'postcategory_id', 'name', 'summary', 'description', 'content', 'image', 'tag', 'slug', 'active'
    ];
}
