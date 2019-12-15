<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function getData()
    {
        $contacts = Contact::select()->orderBy('id', 'desc')->get();
        return Datatables::of($contacts)->make();
    }

    public function index()
    {
        return view('admin.contacts.index');
    }

    public function saveEdit(Request $request){
    //    dd($request->all());
        $updateContact = Contact::where('id',$request->id)->update([
                'status' => $request->status == 1 ? -1 : 1,
        ]);
        return response([
            'errors' => false,
            'messages' => 'Cập nhập trạng thái thành công',
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $check = Contact::destroy($id);
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
        $check = Contact::destroy($arr);
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
