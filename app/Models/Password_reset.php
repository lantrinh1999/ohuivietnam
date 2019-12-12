<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Password_reset extends Model
{
    public $timestamps = false;
    protected $table = 'password_resets';
    protected $fillabel = [
        'email','token','created_at',
    ];
}
