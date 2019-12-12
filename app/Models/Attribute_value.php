<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute_value extends Model
{
    protected $table = 'attribute_value';
    protected $fillable = [
        'attribute_id',
        'name',
        'slug',
        'value',
    ];

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute', 'attribute_id', 'id');
    }

    public static function getAttributeID($id)
    {
        $data = self::findOrFail($id);
        return $data->attribute_id;
    }
}
