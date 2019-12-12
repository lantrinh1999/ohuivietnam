<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('user','product')->get();
        return view('admin.comments.index',compact('comments'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $check = Comment::destroy($id);
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
        $check = Comment::destroy($arr);
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
