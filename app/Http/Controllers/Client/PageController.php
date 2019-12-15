<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class PageController extends Controller
{
    public function contact()
    {
        return view('client.contact');
    }

    public function submitContact(Request $request){
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'email.email' => 'Không đúng định dạng email',
                'email.required' => 'Email không được để trống',
                'title.required' => 'Tiêu đề không được để trống',
                'content.required' => 'Nội dung không tồn tại',
            ]
        );

        
        if ($validate->fails()) {
            return response(
                [
                    'errors' => true,
                    'messages' => $validate->errors(),
                ]
            );
        } else {
            $check = Contact::insert([
                'name' => $request->name,
                'email' => $request->email,
                'title' => $request->title,
                'content' => $request->content,
                'created_at' => -1,
            ]);
            return response(
                [
                    'errors' => false,
                    'messages' => [
                        0 => 'Gửi liên hệ thành công',
                    ],
                ]
            );
            
        }
    }
}
