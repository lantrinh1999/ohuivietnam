<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Post;


class PostController extends Controller
{
    public function getData()
    {
        $posts = Post::select()->orderBy('id', 'desc')->get();
        return Datatables::of($posts)->make();
    }

    public function index()
    {
        $post = Post::all();
        return view('admin.posts.index',compact('post'));
    }

    
    public function add()
    {
        return view('admin.posts.add');
    }

   
    public function saveAdd(Request $request,$action)
    {
        // dd($action);
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'slug' => 'required|unique:posts,slug',
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
            $result = Post::insert($data);
            if ($result) {
                if ($action == 'save') {
                    return redirect()->back()->with('success', 'Thêm bài viết thành công');
                }else{
                    return redirect()->route('admin.posts.index')->with('success', 'Thêm bài viết thành công');
                }
            }else{
                return redirect()->back()->with('error', 'Thêm bài viết không thành công');
               
            }
        }
    }

    
    public function edit($id)
    {
        $post = Post::where('id',$id)->first();
        return view('admin.posts.edit',compact('post'));
    }

    
    public function saveEdit(Request $request, $id, $action)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'slug' => 'required|unique:posts,slug,'.$id,
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
        }else{
            $data = $request->except('_token');

            $check = Post::where('id',$id)->update($data);
            
            if ($check > 0) {
                if ($action == 'save') {
                    return redirect()->back()->with('success', 'Sửa bài viết viết thành công');
                } else {
                    return redirect()->route('admin.posts.index')->with('success', 'Sửa bài viết viết thành công');
                }
            }else{
                
                    return redirect()->back()->with('error', 'Sửa bài viết không thành công');
                
            }
        }
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $check = Post::destroy($id);
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
        $check = Post::destroy($arr);
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
