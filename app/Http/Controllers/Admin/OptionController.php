<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Option;
use App\Models\Post;
use Illuminate\Http\Request;
use Validator;

// use Illuminate\Support\Facades\Input;

class OptionController extends Controller
{
    private $categories;
    public function index()
    {
        return view('admin.options.theme_option');
    }

    public function saveLogo(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'logo' => [
                    'required',
                    'regex:/\.gif$|\.png$|\.jpg$/i',
                ],
            ],
            [
                'logo.required' => 'Mời chọn ảnh.',
                'logo.regex' => 'Mời chọn ảnh.',
            ],
        );

        if ($validator->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validator->errors(),
            ];
            return response($errors);
        }
        $logo = Option::where('key', '=', 'logo')->first();
        if (empty($logo->key)) {
            $logo = new Option();
        }
        $logo->name = 'Logo';
        $logo->key = 'logo';
        $logo->value = $request->logo;
        $logo->save();
        return response()->json([
            'errors' => false,
            'messages' => $logo,
        ]);

    }

    public function saveSlide(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'slide.*.image' => [
                    'required',
                    'regex:/\.gif$|\.png$|\.jpg$/i',
                ],
            ],
            [
                'slide.*.image.required' => 'Mời chọn ảnh.',
                'slide.*.image.regex' => 'Mời chọn ảnh.',
            ],
        );

        if ($validator->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validator->errors(),
            ];
            return response($errors);
        }
        $slide = Option::where('key', '=', 'slide')->first();
        if (empty($slide->key)) {
            $slide = new Option();
        }
        $slide->name = 'slide';
        $slide->key = 'slide';
        $slide->value = json_encode($request->slide);
        $slide->save();
        return response()->json([
            'errors' => false,
            'messages' => $request->slide,
        ]);

    }

    public function savePoint(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'point_introduce' => [
                    'nullable',
                    'numeric',
                ],
                'point_bonus' => [
                    'nullable',
                    'numeric',
                ],
            ],
            [
                'point_bonus.required' => 'Mời nhập số.',
                'point_bonus.numeric' => 'Mời nhập số.',
            ],
        );

        if ($validator->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validator->errors(),
            ];
            return response($errors);
        }
        $point_introduce = Option::where('key', '=', 'point_introduce')->first();
        if (empty($point_introduce->key)) {
            $point_introduce = new Option();
        }
        $point_introduce->name = 'point_introduce';
        $point_introduce->key = 'point_introduce';
        $point_introduce->value = (int) $request->point_introduce;
        $point_introduce->save();

        $point_bonus = Option::where('key', '=', 'point_bonus')->first();
        if (empty($point_bonus->key)) {
            $point_bonus = new Option();
        }
        $point_bonus->name = 'point_bonus';
        $point_bonus->key = 'point_bonus';
        $point_bonus->value = (int) $request->point_bonus;
        $point_bonus->save();

        return response()->json([
            'errors' => false,
            'messages' => $request->all(),
        ]);

    }

    public function menu()
    {
        $data = [];
        $posts = Post::all();
        $menu = get_option('menu');
        $menu = json_decode($menu);
        // dd($menu);
        $categories = Category::GetAll()->with('getChild')->get();
        return view('admin.options.menu', compact('menu', 'posts', 'categories'));
    }

    public function saveMenu(Request $request)
    {

        $menu = Option::where('key', '=', 'menu')->first();
        if (empty($menu->key)) {
            $menu = new Option();
        }
        $menu->name = 'menu';
        $menu->key = 'menu';
        $menu->value = $request->menu;
        $menu->save();

        return response()->json([
            'errors' => false,
            'messages' => $menu,
        ]);

    }

    public function saveService(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'service.*' => [
                    'required',
                ],
                'service.*.title' => [
                    'required',
                ],
                'service.*.des' => [
                    'required',
                ],
                'service.*.icon' => [
                    'required',
                ],
            ],
            [
                'service.*.required' => 'Mời nhập đầy đủ thông tin.',
                'service.*.title.required' => 'Mời nhập đầy đủ thông tin.',
                'service.*.des.required' => 'Mời nhập đầy đủ thông tin.',
                'service.*.icon.required' => 'Mời nhập đầy đủ thông tin.',
            ],
        );

        if ($validator->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validator->errors(),
                'data' => $request->all(),
            ];
            return response($errors);
        }

        // dd($request->service);

        $intro_service = Option::where('key', '=', 'intro_service')->first();
        if (empty($intro_service->key)) {
            $intro_service = new Option();
        }
        $intro_service->name = 'intro_service';
        $intro_service->key = 'intro_service';
        $intro_service->value = json_encode($request->service);
        $intro_service->save();
        return response()->json([
            'errors' => false,
            'messages' => $intro_service,
        ]);

    }

    public function contact()
    {
        return view('admin.options.page_contact');
    }

    public function saveContact(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'map' => [
                    'required',
                ],
                'phone' => [
                    'required',
                    'regex:/((09|03|07|08|05|04|06)+([0-9]{8,9})\b)/',

                ],
                'email' => [
                    'required',
                    'email',
                ],
                'address' => [
                    'required',
                ],
                // 'facebook' => [
                //     'required',
                // ],
            ],
            [
                'map.required' => 'Mời nhập đầy đủ thông tin.',
                'phone.required' => 'Mời nhập đầy đủ thông tin.',
                'email.required' => 'Mời nhập đầy đủ thông tin.',
                'email.email' => 'Mời nhập email.',
                'address.required' => 'Mời nhập đầy đủ thông tin.',
                'facebook.required' => 'Mời nhập đầy đủ thông tin.',
                'phone.regex' => 'Sai định dạng số điện thoại',
            ],
        );

        if ($validator->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validator->errors(),
                'data' => $request->all(),
            ];
            return response($errors);
        }

        $data['phone'] = $request->phone;
        $data['map'] = $request->map;
        $data['address'] = $request->address;
        $data['email'] = $request->email;
        // $data['facebook'] = $request->facebook;

        $contact = Option::where('key', '=', 'contact')->first();
        if (empty($contact->key)) {
            $contact = new Option();
        }
        $contact->name = 'contact';
        $contact->key = 'contact';
        $contact->value = json_encode($data);
        $contact->save();
        $errors = [
            'errors' => false,
            'data' => $data,
        ];
        return response()->json($data);

    }

}
