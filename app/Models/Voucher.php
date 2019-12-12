<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';
    protected $fillable = [
        'user_id',
        'code',
        'name',
        'type',
        'discount_value',
        'status',
        'created_at'
    ];
}
