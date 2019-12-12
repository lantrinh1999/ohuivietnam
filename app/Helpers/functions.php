<?php
use App\Models\Option;
use App\Models\Product;
use App\Models\Attribute_value;


if (!function_exists('test')) {
    function test()
    {
        return 'test';
    }
}

if (!function_exists('activeNav')) {
    function activeNav($segment_2 = '', $segment_3 = '')
    {
        if ($segment_2 == '' && Request::segment(2) == $segment_2 && Request::segment(3) == $segment_2 && $segment_2 == $segment_3) {
            return 'active';
        } else {
            if (Request::segment(2) === $segment_2) {
                if (empty($segment_3)) {
                    return 'active';
                } else {
                    if (in_array(Request::segment(3), ['list', 'index', '', null]) && in_array($segment_3, ['list', 'index', '', null])) {
                        return 'active';
                    } elseif (Request::segment(3) == $segment_3) {
                        return 'active';
                    } else {
                        return '';
                    }
                }
            }
        }
    }
}

if (!function_exists('getToken')) {
    function getToken($length = 12)
    {
        $token = '';
        $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeAlphabet .= time();
        $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
        $codeAlphabet .= '0123456789';
        $max = strlen($codeAlphabet); // edited

        for ($i = 0; $i < $length; ++$i) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $token;
    }
}

if (!function_exists('get_option')) {
    function get_option($key){
        $option = Option::where('key',$key)->first();
        return $option->value;
    }
}

if (!function_exists('ohui_number_format')) {
    function ohui_number_format($price)
    {
        $price2 = number_format($price, 0, '', ',') . 'đ';
       return $price2;
    }
}

if(!function_exists('get_product_by_id')){
    function get_product_by_id($id){
        $product = Product::where('id', $id)->with('galleries')->first();
        return $product;
    }
}

if(!function_exists('get_attribute_value_by_id')){
    function get_attribute_value_by_id($id){
        if ($id == 0) {
            $value = null;
        }else{
            $value = Attribute_value::where('id',$id)->first();
        }

        return $value;
    }
}

if (!function_exists('getCookieCouPon')) {
    function getCookieCouPon()
    {
        $value = Cookie::get('coupon');
        if (empty($value)) {
            $value = null;
        }else{
            $value = json_decode($value,true);
        };
        return $value;
    }
}
