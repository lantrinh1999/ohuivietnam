<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;
use Validator;

// use Illuminate\Support\Facades\Input;

class OptionController extends Controller
{

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
                'point_order' => [
                    'nullable',
                    'numeric',
                ],
            ],
            [
                'point_order.required' => 'Mời nhập số.',
                'point_order.numeric' => 'Mời nhập số.',
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

        $point_order = Option::where('key', '=', 'point_order')->first();
        if (empty($point_order->key)) {
            $point_order = new Option();
        }
        $point_order->name = 'point_order';
        $point_order->key = 'point_order';
        $point_order->value = (int) $request->point_order;
        $point_order->save();

        return response()->json([
            'errors' => false,
            'messages' => $request->all(),
        ]);

    }

}
