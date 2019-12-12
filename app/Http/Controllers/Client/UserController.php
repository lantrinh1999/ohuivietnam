<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Get_reward;
use App\Models\Voucher;
use App\Models\User;
use App\Models\History_reward;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Account;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
class UserController extends Controller
{
    public function index(){
        if (Auth::check()) {
            if (Auth::user()->role >= 300) {
                $orders = Order::where('status',1)->orderBy('created_at','desc')->with(['order_status','account','order_details' => function($query){
                    return $query->with(['product' => function($query2){
                        return $query2->select('name','regular_price','id','sale_price','slug','is_simple')->with('variants');
                    } ,'value']);
                }])->limit(5)->get();
            }else{
                
                $orders = Order::where([['account_id','=',Auth::user()->account->id]])->orderBy('created_at','desc')->with(['order_status','account','order_details' => function($query){
                    return $query->with(['product' => function($query2){
                        return $query2->select('name','regular_price','id','sale_price','slug','is_simple')->with('variants');
                    } ,'value']);
                }])->limit(5)->get();
            };
        //   dd($orders);
        };
        return view('client.account.tai-khoan',compact('orders'));
    }
    // don hang
    public function orderUser(){
        
        if (Auth::check()) {
            $orders = Order::where('account_id',Auth::user()->account->id)->orderBy('created_at','desc')->with(['order_status','account','order_details' => function($query){
                return $query->with(['product' => function($query2){
                        return $query2->select('name','regular_price','id','sale_price','slug','is_simple')->with('variants');
                } ,'value']);
            }])->paginate(10);
        };
        // dd($orders);
        return view('client.account.don_hang',compact('orders'));
    }
    
    // giao dien đổi điểm
    public function get_reward(){
        $get_rewards = Get_reward::all();
        if (Auth::check()) {
            $vouchers = Voucher::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        }
        // dd($get_rewards);
        return view('client.account.doi_diem',compact('get_rewards','vouchers'));
    }

    // đổi voucher
    public function get_voucher(Request $request){
        // inservoucher
        $insertVoucher = Voucher::insert([
            'user_id' => $request->user_id,
            'code' => getToken(10),
            'discount_value' => $request->value,
            'name' => $request->title,
            'type' => $request->type,
            'status' => -1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if ($insertVoucher) {
            // Trừ điểm user
            User::where('id',$request->user_id)->update(
                ['point_reward' => DB::raw('point_reward-'.$request->point)]
            );
        }else{
            return response([
                'err' => true,
            ]);
        }

        // insert lịch sử hoạt động
        $insertHistory = History_reward::insert([
            'user_id' => $request->user_id,
            'point' => '-'.$request->point,
            'action' => 'Đổi '.$request->title,
            'status' => 1,
            'created_at' =>  date('Y-m-d H:i:s'),
        ]);

        if ($insertHistory) {
            return response([
                'err' => false,
            ]);
        }else{
            return response([
                'err' => true,
            ]);
        }
    }

    // giao diện lịch sử hoạt động
    public function history_reward(){
        if (Auth::check()) {
            $history_reward = History_reward::where('user_id', Auth::user()->id)->orderBy('id','desc')->paginate(20);
        }else{
            abort(404);
        }
        return view('client.account.hoat_dong',compact('history_reward'));
    }

    // giao diện giới thiệu bạn bè
    public function share_refferal_code(){
        return view('client.account.gioi_thieu_ban_be');
    }

    // giao diện thông tin cá nhân
    public function info_account(){
        // dd('a');
        return view('client.account.thong_tin');
    }

    // cập nhập thông tin cá nhân
    public function save_edit_info_account(Request $request){
        $user = User::find($request->user_id);
        $password_user = $user->password;
        // dd($request->all());
        $rule = [];$messages = [];

        $rule['name'] = 'required';
        $messages['name.required'] = 'Tên không được để trống';


        $dataUpdate = [];
        // thay mat khau
        if (!empty($request->is_change_pass) && $request->is_change_pass == 'on' ) {
            $rule['old_password'] = [
                    'required',
                    function ($attribute, $value, $fail) use ($password_user) {
                        if (!Hash::check($value, $password_user)) {
                            return $fail('Mật khẩu cũ không chính xác');
                        }
                    }
            ];
            $rule['new_password'] = 'required|min:8';
    
            $rule['old_password'] = [
                    'required',
                    function ($attribute, $value, $fail) use ($password_user) {
                        if (!Hash::check($value, $password_user)) {
                            return $fail('Mật khẩu cũ không chính xác'); 
                        }
                    }
            ];
            $rule['new_password'] = 'required|min:8';

            $messages['old_password.required'] =  'Mật khẩu cũ không được để trống';
            $messages['new_password.required'] =  'Mật khẩu mới không được để trống';
            $messages['new_password.min'] =  'Mật khẩu có ít nhất 8 ký tự';
            

            $dataUpdate['password'] = bcrypt($request->password);
        }

        // upload avatar
        if (!empty($request->avatar)) {
            
            
            $imageName = time() . '.' . $request->avatar->getClientOriginalName();
            
            $request->avatar->move(public_path('/uploads/avatars/'), $imageName);
            $dataUpdate['avatar'] = '/uploads/avatars/'.$imageName;
        }

        $validator = Validator::make(
            $request->all(),
            $rule,
            $messages,
        );

        if ($validator->fails()) {
            return response([
                'err' => true,
                'messages' => $validator->errors(),
            ]);
        }else{
            $insert = User::where('id',$request->user_id)->update($dataUpdate);
            $updateAccount = Account::where('user_id',$request->user_id)->update(['name' => $request->name]);
            return response([
                'err' => false,
                'messages' => 'Cập nhập thành công',
            ]);
        }
    }

    

    // giao dien nhap mat gioi thieu
    public function enter_refferal_code(){
        return view('client.account.nhap_ma_gioi_thieu');
    }
    public function use_refferal_code(Request $request){
        $userCurrent = User::where('id',$request->user_id)->first();
        $code_userCurrent = $userCurrent->refferal_code;
        // dd($userCurrent->use_refferal);
        if ($userCurrent->use_refferal != 1) {
            $validator = Validator::make(
                $request->all(),
                [
                    'code' => [
                        'required',
                        'exists:users,refferal_code',
                        function ($attribute, $value, $fail) use ($code_userCurrent) {
                            if ($value == $code_userCurrent) {
                                return $fail('Không thể sử dụng mã giới thiệu của chính mình');
                            }
                        }
                    ],
                ],
                [
                    'code.required' => 'Nhập mã giới thiệu',
                    'code.exists' => 'Mã giới thiệu không tồn tại',
                ],
            );

            if ($validator->fails()) {
                return response([
                    'err' => true,
                    'messages' => $validator->errors(),
                ]);
            }else{
                $reward_points = get_option('point_introduce');
                
                // cổng điểm cho người dùng
                $updateUserCurrent = User::where('id', $request->user_id)->update(
                        [
                            'point_reward' => DB::raw('point_reward+' . $reward_points),
                            'use_refferal' => 1,
                        ]
                );
                // công điểm cho người giới thiệu
                $userIntroduction = User::where('refferal_code', $request->code)->first();
                $updateUserIntroduction = User::where('id', $userIntroduction->id )->update(
                    ['point_reward' => DB::raw('point_reward+' . $reward_points)]
                );
                
                // insert lịch sử
                $insertHistory = History_reward::insert(
                    [
                        [
                        'user_id' => $request->user_id,
                        'point' =>  $reward_points,
                        'action' => 'Nhập mã giới thiệu',
                        'status' => 1,
                        'created_at' =>  date('Y-m-d H:i:s'),
                        ],
                        [
                        'user_id' => $userIntroduction->id,
                        'point' =>  $reward_points,
                        'action' => 'Giới thiệu thành viên',
                        'status' => 1,
                        'created_at' =>  date('Y-m-d H:i:s'),
                        ],
                    ]
                );
                return response([
                    'err' => false,
                    'messages' => 'thành công',
                ]);
            }
        }else{
            return response([
                'err' => true,
                'messages' => 
                [
                    'code' => 'Có lỗi xảy ra',
                ],
            ]);
        }
        
    }
}
