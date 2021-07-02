<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
   //
   protected $table = 'user_groups';
   protected $fillable = ['name', 'status'];

   public function user()
   {
       return $this->hasMany(User::class);
   }
}
