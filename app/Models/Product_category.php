<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    protected $table = 'product_category';
    protected $fillable = [
        'id',
        'product_id',
        'category_id',
    ];
}
