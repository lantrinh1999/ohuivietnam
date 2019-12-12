<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'code',
        'account_id',
        'note',
        'payment_method',
        'payment_status',
        'discount_id',
        'voucher_id',
        'total',
        'status'
    ];
    
    public function account(){
        return $this->hasOne('App\Models\Account','id','account_id');
    }

    public function order_details(){
        return $this->hasMany('App\Models\Order_detail','order_id','id');
    }
    public function order_status(){
        return $this->hasOne('App\Models\Status','id','status');
    }

    public function discount(){
        return $this->hasOne('App\Models\Discount','id','discount_id');
    }

    public function voucher(){
        return $this->hasOne('App\Models\Voucher','id','voucher_id');
    }
}
