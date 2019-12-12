<?php

namespace App\Http\Controllers\Client;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Redirect;
use Cart;
use App\Models\Product;
use Validator;
use App\Models\Voucher;
USE App\Models\Discount;
use App\Models\Order;
use App\Models\Order_detail;
use Auth;
use App\Models\Account;
use Response;
use Cookie;
use Mail;
class CartController extends Controller
{
    public function addCart(Request $request){
        // dd($request->all());
        $product = Product::where('id',$request->id)->first();
        $cart = Cart::add([
            'id' => $request->id.'_'. $request->id_value,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'weight' => 0,
        ]);

        if ($cart) {
            return response([
                'errors' => false,
            ]);
        }else{
            return response([
                'errors' => true,
            ]);
        }
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function removeCartHeader($rowId)
    {
        // dd($rowId);
        $cart = Cart::remove($rowId);
        
        return redirect()->back();
    }

    public function updateCart(Request $request, $rowId)
    {
        
        $updateCart = Cart::update($rowId, ['qty' => $request->qty]);
        if ($updateCart) {
            return redirect()->back();
        }
    }

    public function cart(){
        $carts = Cart::content();
        return view('client.cart-page', compact('carts'));
    }

    public function clearCart(){
        Cart::destroy();
        Cookie::queue(
            Cookie::forget('coupon')
        );
        return redirect()->back();
    }

    public function sendCodeDiscount(Request $request){
        $id = $request->id;
        $validator = Validator::make(
            $request->all(),
            [
                'code' => [
                    'required',
                    function($attr,$value,$fail) use($id){
                        $voucher = Voucher::where(['code' => $value,'status' => -1])->where('user_id', $id)->first();
                        $discount = Discount::where('code', $value)->first();
                        $data_current = date("Y-m-d");
                        if (empty($voucher) && empty($discount)) {
                            return $fail('Mã giảm giá không tồn tại');
                        };
                        if (!empty($discount)) {
                            if (strtotime($data_current) > strtotime($discount->date_end)) {
                                return $fail('Mã giảm giá không tồn tại');
                            };
                        }
                        
                    },
                    
                 ],
            ],
            [
                'code.required' => 'Điền mã giảm giá',
            ],
        );

        if ($validator->fails()) {
            return response([
                'errors' => true,
                'messages' => $validator->errors(),
            ]);
        }else{
            $voucher = Voucher::where('code', $request->code)->first();
            if (!empty($voucher)) {
                $type = 'voucher';
                $nameVoucher = $voucher->name;
                $typeVoucher = $voucher->type;
                $valueVoucher = $voucher->discount_value;
                return response([
                    'errors' => false,
                    'messages' => [
                        'typeCoupon' => $type, 
                        'name' => $nameVoucher,
                        'type' => $typeVoucher,
                        'value' => $valueVoucher,
                        
                    ],
                ]);
            };

            $discount = Discount::where('code', $request->code)->first();
            if (!empty($discount)) {
                $nameDiscount = $discount->description;
                $typeVoucher = $discount->type;
                $valueVoucher = $discount->value;
                $type = 'discount';

                return response([
                    'errors' => false,
                    'messages' => [
                        'typeCoupon' => $type,
                        'name' => $nameDiscount,
                        'type' => $typeVoucher,
                        'value' => $valueVoucher,
                    ],
                ]);
            };
            
            
        }
    }

    public function saveCouponIntoCookie(Request $request){
        // dd($request->cookie('coupon'));
            $arr_coupon = [
                'name' => $request->name,
                'code' => $request->code,
                'value' => $request->value,
                'type' => $request->type,
                'typeCoupon' => $request->typeCoupon,
            ];
        $response = Response::make('Set Cookie');

        Cookie::queue('coupon', json_encode($arr_coupon), 60);

        return response([
            'errors' => false,
        ]);
    }

    // luu don hang
    public function saveOrder(Request $request){
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'required|regex:/[0-9]{9,10}/',
                'email' => 'required|email',
                'address' => 'required',
                'option_payment' => 'required'
            ],
            [
                'name.required' => 'Nhập tên',
                'phone.required' => 'Nhập số điện thoại',
                'phone.regex' => 'Không đúng định dạng số điện thoại',
                'email.required' => 'Nhập mail',
                'address.required' => 'Nhập địa chỉ',
                'option_payment.required' => 'Chọn phương thức thanh toán'
            ]
        );

        if ($validator->fails()) {
            return response([
                'messages' => $validator->errors(),
                'errors' => true,
                'type' => 'errors'
            ], 200);
        } else {       
            // check coupon
            if (!empty($request->code_coupon) && !empty($request->type_coupon)) {
                if ($request->type_coupon == 'discount') {
                    $discount = Discount::where('code',$request->code_coupon)->first();
                    $discount_id = $discount->id;
                    $voucher_id = null;
                    if ($discount->type == 'percent') {
                        $totalCart = Cart::subtotal(0, '', '') - (Cart::subtotal(0, '', '') / 100 * $discount->value);
                    }elseif($discount->type == 'total'){
                        $totalCart = Cart::subtotal(0, '', '') - $discount->value;
                    }
                }elseif($request->type_coupon == 'voucher'){
                    $voucher = Voucher::where('code',$request->code_coupon)->first();
                    $updateVoucher = Voucher::where('id',$voucher->id)->update(['status' => 1]);
                    $discount_id = null;
                    $voucher_id = $voucher->id;
                    if ($voucher->type == 'percent') {
                        $totalCart = Cart::subtotal(0, '', '') - (Cart::subtotal(0, '', '') / 100 * $voucher->discount_value);
                    } elseif ($voucher->type == 'total') {
                        $totalCart = Cart::subtotal(0, '', '') - $voucher->discount_value;
                    };
                }
            }else{
                $discount_id = null;
                $voucher_id = null;
                $totalCart = Cart::subtotal(0, '', '');
            };

            $data = [
                'name_guest' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'total' => $totalCart,
                'method_payment' => 'abc',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
            ];

            $token = getToken(15);
            // thanh toan online
            if ($request->option_payment == "ATM_ONLINE") {
                include(app_path(). '/Http/Controllers/Client/nganluong/config.php');
                include(app_path(). '/Http/Controllers/Client/nganluong/NL_Checkoutv3.php');
                $nlcheckout = new NL_CheckOutV3(MERCHANT_ID, MERCHANT_PASS, RECEIVER, URL_API);
                $total_amount = $totalCart;
                
                $array_items[0] = array(
                    'item_name1' => 'Product name',
                    'item_quantity1' => 1,
                    'item_amount1' => $total_amount,
                    'item_url1' => 'http://nganluong.vn/'
                );

                $array_items = array();
                $payment_method = $request->option_payment;
                $bank_code = $request->bankcode;
                $order_code = $token;

                $payment_type = 'Online';
                $discount_amount = 0;
                $order_description = '';
                $tax_amount = 0;
                $fee_shipping = 0;
                $return_url = route('page_thank');
                $cancel_url = route('checkout');

                $buyer_fullname = $request->name;
                $buyer_email = $request->email;
                $buyer_mobile = $request->phone;

                $buyer_address = '';

                if (strlen($bank_code) == 0) {
                    return response([
                        'messages' => 'Chọn ngân hàng thanh toán',
                        'errors' => true,
                        'type' => 'checkout_err',
                    ], 200);
                }else{
                    if ($payment_method == "ATM_ONLINE" && $bank_code != '') {
                        $nl_result = $nlcheckout->BankCheckout(
                            $order_code,
                            $total_amount,
                            $bank_code,
                            $payment_type,
                            $order_description,
                            $tax_amount,
                            $fee_shipping,
                            $discount_amount,
                            $return_url,
                            $cancel_url,
                            $buyer_fullname,
                            $buyer_email,
                            $buyer_mobile,
                            $buyer_address,
                            $array_items
                        );
                    }
                if ($nl_result->error_code == '00') {
                        // lưu đơn hàng 
                        if (Auth::check()) {
                            $account = Account::where('user_id', Auth::user()->id)->first();
                            if ($account) {
                                Account::where('user_id', Auth::user()->id)->update([
                                    'name' => $request->name,
                                    'phone' => $request->phone,
                                    'address' => $request->address,
                                ]);
                            };
                            $orderInsert = Order::create([
                                'code' => $token,
                                'account_id' => $account->id,
                                'note' => $request->note,
                                'discount_id' => $discount_id,
                                'voucher_id' => $voucher_id,
                                'payment_method' => 1,
                                'payment_status' => -1,
                                'total' => $totalCart,
                                'status' => 1,
                            ]);

                            $carts = Cart::content();
                            foreach ($carts as $cart) {
                                $id_arr = explode('_', $cart->id);
                                $id_product = $id_arr[0];
                                $id_value = $id_arr[1];
                                // dd($id_arr);
                                $orderdetailInsert = Order_detail::insert([
                                    'order_id' => $orderInsert->id,
                                    'product_id' => $id_product,
                                    'value_id' =>  $id_value,
                                    'amount' => $cart->price * $cart->qty,
                                    'quantity' => $cart->qty,
                                ]);
                            };
                            $email_guest = $request->email;
                            // gui mail khach hang
                            Mail::send('mail/order_success', array('data' => $data, 'carts' => $carts, 'code_order' => $token), function ($message) use ($email_guest) {
                                $message->to($email_guest, 'Ohuivietnam')->subject('Đặt hàng thành công!');
                            });

                            // gui mail admin
                            $email_admin = get_option('email_admin');

                            Mail::send('mail/order_success_admin', array('data' => $data, 'carts' => $carts, 'code_order' => $token), function ($message) use ($email_admin) {
                                $message->to($email_admin, 'Ohuivietnam')->subject('Đơn hàng mới!');
                            });
                            
                            $url =  (array) $nl_result->checkout_url;
                            return response([
                                'messages' => 'checkout_online',
                                'errors' => true,
                                'url' => $url[0],
                                'type' => 'checkout',
                            ], 200);
                        } else {

                            $createdAccount = Account::create([
                                'user_id' => null,
                                'name' => $request->name,
                                'phone' => $request->phone,
                                'address' => $request->address,
                            ]);

                            $payment_method = $request->option_payment == 'SHIPPING' ? 2  : 1;
                            $orderInsert = Order::create([
                                'code' => $token,
                                'account_id' => $createdAccount->id,
                                'note' => $request->note,
                                'payment_method' => 1,
                                'discount_id' => $discount_id,
                                'voucher_id' => $voucher_id,
                                'payment_status' => -1,
                                'total' => $totalCart,
                                'status' => 1,
                            ]);

                            $carts = Cart::content();
                            foreach ($carts as $cart) {
                                $id_arr = explode('_', $cart->id);
                                $id_product = $id_arr[0];
                                $id_value = $id_arr[1];

                                $orderdetailInsert = Order_detail::insert([
                                    'order_id' => $orderInsert->id,
                                    'product_id' => $id_product,
                                    'value_id' =>  $id_value,
                                    'amount' => $cart->price * $cart->qty,
                                    'quantity' => $cart->qty,
                                ]);
                            };
                            
                            $url =  (array) $nl_result->checkout_url;
                            return response([
                                'messages' => 'checkout_online',
                                'errors' => true,
                                'url' => $url[0],
                                'type' => 'checkout',
                            ], 200);
                        };
                    }
                }
                // hinh thuc thanh toan tra sau
            }else{
                // Đã đăng nhập
                if (Auth::check()) {
                    $account = Account::where('user_id', Auth::user()->id)->first();
                    if ($account) {
                        Account::where('user_id', Auth::user()->id)->update([
                            'name' => $request->name,
                            'phone' => $request->phone,
                            'address' => $request->address,
                            'created_at' => date('Y/m/d H:i:s'),
                        ]);
                    };
                    $payment_method = $request->option_payment == 'SHIPPING' ? 2  : 1;
                    $orderInsert = Order::create([
                        'code' => $token,
                        'account_id' => $account->id,
                        'note' => $request->note,
                        'discount_id' => $discount_id,
                        'voucher_id' => $voucher_id,
                        'payment_method' => $payment_method,
                        'payment_status' => -1,
                        'total' => $totalCart,
                        'status' => 1,
                    ]);

                    $carts = Cart::content();
                    foreach ($carts as $cart) {
                        $id_arr = explode('_', $cart->id);
                        $id_product = $id_arr[0];
                        $id_value = $id_arr[1];
                       

                        $orderdetailInsert = Order_detail::insert([
                            'order_id' => $orderInsert->id,
                            'product_id' => $id_product,
                            'value_id' =>  $id_value,
                            'amount' => $cart->price * $cart->qty,
                            'quantity' => $cart->qty,
                        ]);
                    };

                    Cart::destroy();
                    Cookie::queue(
                        Cookie::forget('coupon')
                    );

                    $email_guest = $request->email;
                    // gui mail khach hang
                    Mail::send('mail/order_success', array('data' => $data, 'carts' => $carts, 'code_order' => $token), function ($message) use ($email_guest) {
                        $message->to($email_guest, 'Ohuivietnam')->subject('Đặt hàng thành công!');
                    });

                    // gui mail admin
                    $email_admin = get_option('email_admin');

                    Mail::send('mail/order_success_admin', array('data' => $data, 'carts' => $carts, 'code_order' => $token), function ($message) use ($email_admin) {
                        $message->to($email_admin, 'Ohuivietnam')->subject('Đơn hàng mới!');
                    });

                    return response([
                        'messages' => 'Đặt hàng thành công',
                        'errors' => false,
                    ], 200);
                } else {

                    $createdAccount = Account::create([
                        'user_id' => null,
                        'name' => $request->name,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'created_at' => date('Y/m/d H:i:s'),
                    ]);

                    $payment_method = $request->option_payment == 'SHIPPING' ? 2  : 1;
                    $orderInsert = Order::create([
                        'code' => $token,
                        'account_id' => $createdAccount->id,
                        'note' => $request->note,
                        'payment_method' => $payment_method,
                        'discount_id' => $discount_id,
                        'voucher_id' => $voucher_id,
                        'payment_status' => -1,
                        'total' => $totalCart,
                        'status' => 1,
                    ]);

                    $carts = Cart::content();
                    foreach ($carts as $cart) {
                        $id_arr = explode('_', $cart->id);
                        $id_product = $id_arr[0];
                        $id_value = $id_arr[1];

                        $orderdetailInsert = Order_detail::insert([
                            'order_id' => $orderInsert->id,
                            'product_id' => $id_product,
                            'value_id' =>  $id_value,
                            'amount' => $cart->price * $cart->qty,
                            'quantity' => $cart->qty,
                        ]);
                    };
                    $email_guest = $request->email;
                    // gui mail khach hang
                    Mail::send('mail/order_success', array('data' => $data, 'carts' => $carts, 'code_order' => $token), function ($message) use ($email_guest) {
                        $message->to($email_guest, 'Ohuivietnam')->subject('Đặt hàng thành công!');
                    });

                    // gui mail admin
                    $email_admin = get_option('email_admin');

                    Mail::send('mail/order_success_admin', array('data' => $data, 'carts' => $carts, 'code_order' => $token), function ($message) use ($email_admin) {
                        $message->to($email_admin, 'Ohuivietnam')->subject('Đơn hàng mới!');
                    });

                    Cart::destroy();
                    Cookie::queue(
                        Cookie::forget('coupon')
                    );
                    return response([
                        'messages' => 'Đặt hàng thành công',
                        'errors' => false,
                    ], 200);
                };
            }
           
           
        }
    }
}
