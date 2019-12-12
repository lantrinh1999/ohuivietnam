<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Get_reward extends Model
{
    protected $table = 'get_reward';
    protected $fillable = [
        'name', 'point', 'voucher_value', 'date_end',
    ];
}
