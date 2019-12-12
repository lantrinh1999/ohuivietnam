<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History_reward extends Model
{
    protected $table = 'history_reward';
    protected $fillable = [
        'user_id','point','action','status','created_at'
    ];
}
