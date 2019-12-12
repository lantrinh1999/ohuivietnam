<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'image',
        'description',
        'regular_price',
        'sale_price',
        'is_simple',
        'status',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_category', 'product_id', 'category_id');
    }

    public function variants()
    {
        return $this->hasMany('App\Models\Product_attribute', 'product_id', 'id');
    }
    
    public function galleries(){
        return $this->hasMany('App\Models\Gallery','product_id','id');
    }

    public function getGalleries()
    {
        return Gallery::where('product_id', '=', $this->id)->get();
    }
}
