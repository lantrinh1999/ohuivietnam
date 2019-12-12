<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Cart;
use Cookie;
class LoginController extends Controller
{
    public function showLoginForm(){
        return view('client.login');
    }
    public function postLogin(Request $request){
        $validate = Validator::make(
            $request->all(),
            [
             'email' => 'required|email|exists:users,email',
             'password' => 'required',
            ],
            [
             'email.required' => 'Email không được để trống',
             'email.email' => 'Không đúng định dạng email',
             'password.required' => 'Mật khẩu không được để trống',
             'email.exists' => 'Email không tồn tại',
            ]
        );

        
        if ($validate->fails()) {
            return response(
                [
                    'errors' => true,
                    'data' => $validate->errors(),
                ]
            );
        } else {
            $check = Auth::attempt(['email' => $request->email, 'password' => $request->password,'status' => 1],true);
            if ($check == true) {
                if (Auth::user()->role == 1) {
                    return response(
                        [
                            'errors' => false,
                            'data' => 'user',
                        ]
                    );
                }else{
                    return response(
                        [
                            'errors' => false,
                            'data' => 'admin',
                        ]
                    );
                }
            }else{
                return response(
                    [
                        'errors' => true,
                        'data' => 'Sai thông tin hoặc tài khoản chưa được kích hoạt',
                    ]
                );
            }
            
        }
    }

    public function logOut(){
        Cart::destroy();
        Cookie::queue(
            Cookie::forget('coupon')
        );
        Auth::logout();
        return redirect()->route('/');
    }
}
