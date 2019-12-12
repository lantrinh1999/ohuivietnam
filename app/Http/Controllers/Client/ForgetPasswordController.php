<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\User;
use Mail;
use App\Models\Password_reset;

class ForgetPasswordController extends Controller
{
    public function showForgetPasswordForm(){
        return view('client.forgot_password');
    }

    public function postForgetPassword(Request $request){
        $validate = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|exists:users,email',
            ],
            [
                'email.required' => 'Vui lòng nhập đầy đủ',
                'email.email' => 'Vui lòng nhập đúng định dạng email',
                'email.exists' => 'Email không tồn tại',
            ],
        );

        if ($validate->fails()) {
            return response(
                [
                    'errors' => true,
                    'data' => $validate->errors(),
                ]
            );
        }else{
            $email = $request->email;
            $token = getToken(30);

            $check_already_exist = Password_reset::where('email',$email)->first();
            $data = [
                'email' => $email,
                'token' => $token

            ];
            if ($check_already_exist) {
                Password_reset::where('email',$email)->update($data);
            }else{
                Password_reset::insert($data);
            }
            
           
            Mail::send('mail/forgot_password',$data ,function ($message) use ($email) {
                $message->from('luongnd2286@gmail.com', 'Ohui Việt Nam');
                $message->to($email, 'Ohui Việt Nam')->subject('Quên mật khẩu');
            });
            return response(
                [
                    'errors' => false,
                    'data' => 'true',
                ]
            );
        }
    }

    public function changePassword(Request $request){
        $check = Password_reset::where(['email' =>  $request->email, 'token' => $request->token])->first();
        if (!$check) {
            abort(404);
        }else{
            return view('client.change_password');     
        }
       
    }

    public function saveChangePassword(Request $request){
        $validate = Validator::make(
            $request->all(),
            [
                'password' => 'required|min:8',
                'cf_password' => 'same:password'
            ],
            [
                'password.required' => 'Vui lòng nhập mật khẩu muốn thay đổi',
                'password.min' => 'Mật khẩu phải có ít nhât 8 ký tự',
                'cf_password' => 'Xác nhận mật khẩu chưa đúng',
            ],
        );

        if ($validate->fails()) {
            return response(
                [
                    'errors' => true,
                    'data' => $validate->errors(),
                ]
            );
        } else {

            Password_reset::where('email',$request->email)->delete();
            $result = User::where('email',$request->email)->update(['password' => bcrypt($request->password)]);
            
            if ($result) {
                return response(
                    [
                        'errors' => false,
                        'data' => 'true',
                    ]
                );
            }else{
                abort(404);
            }
            
        }
    }
}
