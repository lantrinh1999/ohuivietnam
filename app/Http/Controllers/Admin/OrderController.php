<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Input;
use App\Models\Order;
use App\Models\History_reward;
use App\Models\User;
use App\Models\Status;
use App\Models\Account;
use Validator;
use DB;
class OrderController extends Controller
{
    
    public function index()
    {
        if (Input::has('status')) {
            $orders = Order::select()->where('status',Input::get('status'))->orderBy('id', 'desc')->get();      
        }else{
            $orders = Order::select()->orderBy('id', 'desc')->get();
        }
        $status = Status::all();
        return view('admin.orders.index',compact('orders','status'));
    }

    public function edit($id){
        $order = Order::where('id',$id)->with('discount','voucher')->first();
        $status = Status::all();
        return view('admin.orders.edit',compact('order','status'));
    }

    public function saveEdit(Request $request,$id){
        $order  = Order::where('id',$id)->update(['status' => $request->value]);
        $order_get = Order::where('id',$id)->first();
        $account  = Account::find($order_get->account_id);
        $user = $account->user;
        
        if (!empty($user) && $request->value == 4) {
           $point = ($order_get->total / get_option('point_bonus'));
           
           User::where('id',$user->id)->update(['point_reward' => DB::raw('point_reward +'.$point)]);
           History_reward::insert([
               'user_id' => $user->id,
               'point' => $point,
               'action' => 'Hoàn thành đơn hàng mã số '.$order_get->code,
               'status' => 1,
               'created_at' => date('Y/m/d H:i:s'),
           ]);
        }
        // if () {
        //     # code...
        // }
        return response(['err' => true]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $check = Order::destroy($id);
        if ($check) {
            return response([
                'err' => false,
                'messages' => 'Xoá thành công',
                'data' => $request->all(),
            ]);
        } else {
            return response([
                'err' => true,
                'messages' => 'Xoá không thành công',
                'data' => $request->all(),
            ]);
        }
    }

    public function deleteMulti(Request $request)
    {
        // dd($request->all());
        $data = $request->data;
        $arr = explode(',', $data);
        $check = Order::destroy($arr);
        if ($check) {
            return response()->json([
                'err' => false,
                'message' => 'success',
                'data' => $arr,
            ]);
        } else {
            return response()->json([
                'err' => true,
                'message' => 'Có gì đó sai sai',
                'data' => $arr,
            ]);
        };
    }
}
