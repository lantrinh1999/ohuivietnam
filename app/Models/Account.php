<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';
    protected $fillable = [
        'user_id','name','phone','address'
    ];

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
