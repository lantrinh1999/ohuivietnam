<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'product_id',
        'user_id',
        'rate_star',
        'content'
    ];

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
