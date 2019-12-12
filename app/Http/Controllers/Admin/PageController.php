<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Yajra\DataTables\Facades\DataTables;
use Validator;
class PageController extends Controller
{
    public function getData()
    {
        $pages = Page::select()->orderBy('id', 'desc')->get();
        return Datatables::of($pages)->make();
    }

    public function index()
    {
        
        return view('admin.pages.index');
    }


    public function add()
    {
        return view('admin.pages.add');
    }


    public function saveAdd(Request $request, $action)
    {
        // dd($action);
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'slug' => 'required|unique:pages,slug',
                'content' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'slug.required' => 'Đường dẫn không được để trống',
                'slug.unique' => 'Đường dẫn bài viết đã bị trùng,điền đường dẫn khác',
                'content.required' => 'Nội dung không được để trống',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        } else {
            $data = $request->except('_token');
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = Page::insert($data);
            if ($result) {
                if ($action == 'save') {
                    return redirect()->back()->with('success', 'Thêm trang thành công');
                } else {
                    return redirect()->route('admin.pages.index')->with('success', 'Thêm trang thành công');
                }
            } else {
                return redirect()->back()->with('error', 'Thêm trang không thành công');
            }
        }
    }


    public function edit($id)
    {
        $page = Page::where('id', $id)->first();
        return view('admin.pages.edit', compact('page'));
    }


    public function saveEdit(Request $request, $id, $action)
    {
        // dd($data);
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'slug' => 'required|unique:pages,slug,' . $id,
                'content' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'slug.required' => 'Đường dẫn đã tồn tại,điền đường dẫn khác',
                'slug.required' => 'Vui lòng chọn kiểu người dùng',
                'content.required' => 'Vui lòng điền nội dung',
            ]
        );

        if ($validate->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validate->errors(),
            ];
            return response($errors);
        } else {
            $data = $request->except('_token');

            $check = Page::where('id', $id)->update($data);

            if ($check > 0) {
                if ($action == 'save') {
                    return redirect()->back()->with('success', 'Sửa trang viết thành công');
                } else {
                    return redirect()->route('admin.pages.index')->with('success', 'Sửa trang viết thành công');
                }
            } else {

                return redirect()->back()->with('error', 'Sửa trang không thành công');
            }
        }
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $check = Page::destroy($id);
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
        $check = Page::destroy($arr);
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
