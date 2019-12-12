<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use Validator;
use Yajra\DataTables\Facades\DataTables;
class DiscountController extends Controller
{
    
    public function getData(){
        $discounts = Discount::select()->orderBy('id', 'desc')->get();
        return Datatables::of($discounts)->make();
    }
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discounts.index',compact('discounts'));
    }

   
    public function saveAdd(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'code' => 'required|unique:discounts,code',
                'value' => 'required',
                'type' => 'required',
                'date_end' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $dataCurrent = date("Y-m-d");
                        if ($dataCurrent >= $value) {
                            return $fail('Ngày hết hạn không thể là ngày hôm nay hoặc ngày trước đó');
                        }                
                    },
                ]
            ],
            [
                'code.required' =>  'Mã giảm giá không được để trống',
                'code.unique' => 'Mã giảm giá này đã tồn tại, điền mã khác',
                'value.required' => 'Giá trị không được để trống',
                'type.required' => 'Chọn loại cho mã giảm giá',
                'date_end.required' => 'Chọn ngày hết hạn của mã giảm giá',
            ]
        );

        if ($validator->fails()) {
            return response([
                'err' => true,
                'messages' => $validator->errors()
            ], 200);
        }else{
            $insert = Discount::insert([
                'code' => $request->code,
                'description' => $request->description,
                'value' => $request->value,
                'type' => $request->type,
                'date_end' => $request->date_end
            ]);

            if ($insert) {
                return response([
                    'err' => false,
                    'messages' => 'Thêm thành công',
                ], 200);
            } else {
                return response([
                    'err' => true,
                    'messages' => 'Có lỗi xảy ra',
                ], 200);
            }
            
           
        }
    }

    
    public function edit($id)
    {
       $discount = Discount::where('id',$id)->first();
        return view('admin.discounts.edit', compact('discount'));
    }

    public function saveEdit(Request $request,$id,$action = 'save'){
        
        $validator = Validator::make(
            $request->all(),
            [
                'code' => 'required|unique:discounts,code,'.$id,
                'value' => 'required',
                'type' => 'required',
                'date_end' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $dataCurrent = date("Y-m-d");
                        if ($dataCurrent >= $value) {
                            return $fail('Ngày hết hạn không thể là ngày hôm nay hoặc ngày trước đó');
                        }
                    },
                ]
            ],
            [
                'code.required' =>  'Mã giảm giá không được để trống',
                'code.unique' => 'Mã giảm giá này đã tồn tại, điền mã khác',
                'value.required' => 'Giá trị không được để trống',
                'type.required' => 'Chọn loại cho mã giảm giá',
                'date_end.required' => 'Chọn ngày hết hạn của mã giảm giá',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $data = $request->except('_token');
            $update = Discount::where('id',$id)->update($data);
            if ($action == 'save_and_exit') {
                return redirect()->route('admin.discounts.index')->with('success', 'Sửa mã giảm giá thành công');
            }else{
                return redirect()->back()->with('success', 'Sửa mã giảm giá thành công');
            }
            
        }
    }
    
    public function delete(Request $request)
    {
        $id = $request->id;
        $check = Discount::destroy($id);
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

        $data = $request->data;
        $arr = explode(',', $data);
        $check = Discount::destroy($arr);
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
