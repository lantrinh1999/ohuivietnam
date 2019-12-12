<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attribute';
    protected $fillable = [
        'name',
        'slug',
    ];

    public function values()
    {
        return $this->hasMany('App\Models\Attribute_value', 'attribute_id', 'id');
    }
}
