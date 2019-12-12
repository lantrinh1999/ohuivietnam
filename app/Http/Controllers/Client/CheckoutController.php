<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Order;
use Cart;
use Cookie;
class CheckoutController extends Controller
{
    public function index(){
        if (!empty(Cart::content()) && Cart::count() == 0) {
            return redirect()->route('/');
        }
        return view('client.checkout');
    }

    public function page_thank(Request $request){
        
        if (Input::has('error_code') && Input::get('error_code') == '00' && Input::has('order_code')  && !empty(Input::get('order_code'))) {
            Order::where('code', Input::get('order_code'))->update(['payment_status' => 1]);
            Cart::destroy();
            Cookie::queue(
                Cookie::forget('coupon')
            );
        }
       return view('client.thankyou');
    }
}
