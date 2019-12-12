<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Response;
use Mail;
use App\Models\Account;
class RegisterController extends Controller
{
    public function showRegisterForm(){
        return view('client.register');
    }
    public function postRegister(Request $request){
        // dd($request->all());
        $validate = Validator::make(
        $request->all(),
        [
           'name' => 'required',
           'email' => [
               'required',
               'email',
               function ($att,$val,$fail){
                    $user = User::where(['email' => $val,'status' => 1])->get();
                    if (count($user) > 0 && !empty($user)) {
                        return $fail ('Email đã được đăng ký');
                    }
               }
            ],
           'password' => 'required|min:8'
        ],
        [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu có ít nhất 8 kí tự'
            
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
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            $user = User::where(['email'=> $request->email])->first();
            $token = getToken(40);
            if (empty($user)) {
            //    dd(getToken(12));
                $userInsert = User::create([
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'refferal_code' => getToken(12),
                    // 'point_reward' => 0,
                    'remember_token' => $token, 
                ]);

                $insertAccount = Account::insert([
                    'user_id' => $userInsert->id,
                    'name' => $request->name,
                ]);

                $data['token'] = $token;
            }else{
                $userInsert = User::where('email',$request->email)->update([
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'refferal_code' => getToken(12),
                    // 'point_reward' => 0,
                    'remember_token' => $token,
                ]);

                $insertAccount = Account::where('user_id',$user->id)->update([
                    'name' => $request->name,
                ]);

                $data['token'] = $token;
            }
            
            $mail = $request->email;
            
            Mail::send('mail/comfirm_register', $data, function ($message) use ($mail) {
                $message->from('luongnd2286@gmail.com', 'Ohui Việt Nam');
                $message->to($mail, 'Ohui Việt Nam')->subject('Kích hoạt tài khoản');
            });

            return response(
                [
                    'errors' => false,
                    'data' => 'Chờ xác nhận',
                ]
            );

        }
    }

    public function confirmUser(Request $request){
        $user = User::where('remember_token',(!empty($_GET['token']) ? $_GET['token'] : '') )->first();
        if (!empty($user) ) {
            User::where('remember_token', (!empty($_GET['token']) ? $_GET['token'] : '') )->update(['remember_token' => null,'status' => 1]);
            return redirect()->route('login');
        }else{
            abort(404);
        };
    }
}
