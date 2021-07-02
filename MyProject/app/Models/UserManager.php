<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserManager extends Model
{
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'group_id', 'firstname', 'lastname', 'email_verified_at', 'phone', 'email', 'password', 'address', 'active','type'
    ];
    public function user_group()
    {
        return $this->belongsTo(UserGroup::class);
    }
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}
