<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    protected $primaryKey = 'id';
    protected $table = 'users';
    // protected $hidden = [
    //     'password'
    // ];
    protected $fillable = [
        'password',
        'name',
        'email',
        'point_reward',
        'refferal_code',
        'avatar',
        'remember_token',
        'role',
        'status',
        'created_at',
        'updated_at'
    ];

    public function account(){
        return $this->hasOne('App\Models\Account','user_id','id');
    }
    
    public function products(){
        return $this->belongsToMany('App\Models\Product','wishlists','user_id','product_id');
    }

  
}
