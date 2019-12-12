<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_attribute extends Model
{
    protected $table = 'product_attribute';
    protected $fillable = [
        'code',
        'product_id',
        'value_id',
        'attribute_id',
        'status',
        'regular_price',
        'sale_price',
        'image',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function value()
    {
        return $this->belongsTo('App\Models\Attribute_value', 'value_id', 'id');
    }

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute', 'attribute_id', 'id');
    }

}
