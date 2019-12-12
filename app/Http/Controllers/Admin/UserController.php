<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Input;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (!Input::has('role')) {
            $users = User::where('role','<', 500)->get();
        }else{
            if (Input::get('role') == 'admin') {
               $users = User::where('role',300)->get();
            }elseif(Input::get('role') == 'user'){
                $users = User::where('role', 1)->get();
            }
        }
        
        if (Input::get('status') == '-1' || Input::get('status') == '0' || Input::get('status') == '1') {
            $status = [Input::get('status')];
        }elseif(Input::get('status') == null){
            $status = [-1,0,1];
        }
        

        if(Input::has('status') && Input::has('role')){
            if (Input::get('role') == 'admin') {
                $users = User::where('role','=',300)
                            ->whereIn('status', $status)
                            ->get();
            } elseif (Input::get('role') == 'user') {
                $users = User::where('role', '=', 1)
                            ->whereIn('status', $status)
                            ->get();
            };
        };
        
        $countAll = count(User::where('role','<', 500)->get());
        $countAdmin = count(User::where('role',300)->get());
        $countUser = count(User::where('role',1)->get());
        
        return view('admin.users.index',compact('users','countAll','countAdmin','countUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validate = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'role' => 'required',
            ],
            [
                'email.required' => 'Email không được để trống',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã được sử dụng',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu tối thiếu 8 kí tự', 
                'role.required' => 'Vui lòng chọn kiểu người dùng',
            ]
        );
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        } else {
            $data = $request->except('_token','password','name');
            $data['password'] = bcrypt($request->password);
            $data['refferal_code'] = getToken(12);
            $result = User::create($data);
            $createAccount = Account::insert([
                'name' => $request->name,
                'user_id' => $result->id,
                ]);
            if ($result) {
                return redirect()->route('admin.users.index')->with('success', 'Thêm tài khoản thành công');
            }else{
                return redirect()->route('admin.users.index')->with('error', 'Thêm tài khoản không thành công');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        if (!$user) {
            abort(404);
        }
        
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', 'point', 'refferal_code', 'email','name');
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'role' => 'required',
                'status' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'role.required' => 'Vui lòng chọn kiểu người dùng',
                'status.required' => 'Vui lòng chọn trạng thái',
            ]
        );

        if ($validate->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validate->errors(),
            ];
            return response($errors);
        }else{
            $check = User::where('id',$id)->update($data);
            $updateAccount = Account::where('user_id',$id)->update(['name' => $request->name]);
            if ($check == 1) {
                $errors = [
                    'errors' => false,
                    'messages' => 'Sửa thành công',
                ];
                return response($errors);
            }else{
                $errors = [
                    'errors' => true,
                    'messages' => 'Có lỗi xảy ra !!!',
                ];
                return response($errors);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        if (!$user) {
           abort(404);
        }else{

            if ($user->role != 500 && $user->id != Auth::user()->id) {
                $check  = User::where('id', $request->id)->delete();
                // dd($check);
                if ($check == 1) {
                    return response()->json(['err' => false], 200);
                } else {
                    return response()->json(['err' => true], 200);
                }

            }else{
                return response()->json(['err' => true], 200);
            }
        }
       
    }

    public function multiDel(Request $request)
    {
        $categories = $request->categories;
        $arr = explode(',', $categories);
        $check = User::destroy($arr);
        if ($check) {
            return response()->json([
                'error' => false,
                'message' => 'success',
                'data' => $arr,
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Có gì đó sai sai',
                'data' => $arr,
            ]);
        }
    }

}
