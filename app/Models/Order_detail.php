<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'product_id',
        'value_id',
        'price',
        'quantity',
    ];

    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }
    public function value(){
        return $this->hasOne('App\Models\Attribute_value','id','value_id');
    }
}
