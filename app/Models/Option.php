<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'options';
    protected $fillable = [
        'name',
        'key',
        'value',
        'created_at',
        'update_at',
    ];
}
