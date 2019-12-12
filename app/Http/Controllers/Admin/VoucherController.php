<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Get_reward;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Discount;
class VoucherController extends Controller
{
    public function getData()
    {
        $vouchers = Get_reward::select()->orderBy('id', 'desc')->get();
        return Datatables::of($vouchers)->make();
    }
    public function index()
    {
        $vouchers = Get_reward::all();
        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function saveAdd(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'point' => 'required',
                'type' => 'required',
                'voucher_value' => 'required'
            ],
            [
                'name.required' =>  'Không được để trống',
                'point.required' => 'Điểm quy đổi không được để trống',
                'voucher_value.required' => 'Giá trị không được để trống',
                'type.required' => 'Chọn loại cho mã giảm giá',
            ]
        );

        if ($validator->fails()) {
            return response([
                'err' => true,
                'messages' => $validator->errors()
            ], 200);
        } else {
            $insert = Get_reward::insert([
                'name' => $request->name,
                'point' => $request->point,
                'type' => $request->type,
                'voucher_value' => $request->voucher_value
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
        $voucher = Get_reward::where('id', $id)->first();
        return view('admin.vouchers.edit', compact('voucher'));
    }

    public function saveEdit(Request $request, $id, $action = 'save')
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'point' => 'required',
                'type' => 'required',
                'voucher_value' => 'required'
            ],
            [
                'name.required' =>  'Không được để trống',
                'point.required' => 'Điểm quy đổi không được để trống',
                'voucher_value.required' => 'Giá trị không được để trống',
                'type.required' => 'Chọn loại cho voucher',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $data = $request->except('_token');
            $update = Get_reward::where('id', $id)->update($data);
            if ($action == 'save_and_exit') {
                return redirect()->route('admin.vouchers.index')->with('success', 'Sửa voucher thành công');
            } else {
                return redirect()->back()->with('success', 'Sửa voucher thành công');
            }
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $check = Get_reward::destroy($id);
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
        $check = Get_reward::destroy($arr);
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
