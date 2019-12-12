<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Attribute_value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    /**
     * List attributes
     *
     * @return void
     */
    public function index()
    {
        $attributes = Attribute::all();
        return view('admin.attribute.index', compact('attributes'));
    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:attribute,name|max:190|min:2',
                'slug' => 'required|unique:attribute,slug|max:190|min:2|regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/',
            ],
            [
                // tên thuộc tính
                'name.required' => 'Mời nhập tên thuộc tính.',
                'name.unique' => 'Tên thuộc tính đã tồn tại.',
                'name.max' => 'Tên thuộc tính không vượt quá 190 kí tự.',
                'name.min' => 'Tên thuộc tính nhiều hơn 2 kí tự.',
                // slug
                'slug.required' => 'Mời nhập đường dẫn.',
                'slug.unique' => 'Đường dẫn đã tồn tại.',
                'slug.max' => 'Đường dẫn không vượt quá 190 kí tự.',
                'slug.min' => 'Đường dẫn phải nhiều hơn 2 kí tự.',
                'slug.regex' => 'Không đúng định dạng đường dẫn.',

            ],
        );

        if ($validator->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validator->errors(),
            ];
            return response($errors);
        }

        $attribute = new Attribute();
        $attribute->name = $request->name;
        $attribute->slug = $request->slug;
        $attribute->save();
        $errors = [
            'errors' => false,
            'messages' => 'Thêm danh mục thành công!',
        ];
        return response($errors);

    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function getData(Request $request)
    {
        $columns = ['attribute.name', 'attribute.slug'];
        $limit = $request->input('length');
        $start = $request->input('start');
        $orders = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $total = Attribute::count();
        $data = Attribute::where('attribute.name', 'like', "%$search%")
            ->orWhere('attribute.slug', 'like', "%$search%")
            ->offset($start)->limit($limit)->orderBy($orders, $dir)->get();
        $data->load('values');
        $json_data = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($total),
            'recordsFiltered' => intval($total),
            'data' => $data,
        ];
        return response()->json($json_data);

    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $check = Attribute::destroy($id);
        if ($check) {
            return response([
                'errors' => false,
                'messages' => 'Xoá thành công',
                'data' => $request->all(),
            ]);
        } else {
            return response([
                'errors' => true,
                'messages' => 'Xoá không thành công',
                'data' => $request->all(),
            ]);
        }
    }

    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('admin.attribute.edit', compact('attribute'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => [
                    'required',
                    'max:190',
                    'min:2',
                    'unique:attribute,name,' . $id,
                ],
                'slug' => [
                    'required',
                    'max:190',
                    'min:2',
                    'unique:attribute,slug,' . $id,
                    'regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/',
                ],
            ],
            [
                // tên thuộc tính
                'name.required' => 'Mời nhập tên thuộc tính.',
                'name.unique' => 'Tên thuộc tính đã tồn tại.',
                'name.max' => 'Tên thuộc tính không vượt quá 190 kí tự.',
                'name.min' => 'Tên thuộc tính nhiều hơn 2 kí tự.',
                // slug
                'slug.required' => 'Mời nhập đường dẫn.',
                'slug.unique' => 'Đường dẫn đã tồn tại.',
                'slug.max' => 'Đường dẫn không vượt quá 190 kí tự.',
                'slug.min' => 'Đường dẫn phải nhiều hơn 2 kí tự.',
                'slug.regex' => 'Không đúng định dạng đường dẫn.',

            ],
        );

        if ($validator->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validator->errors(),
            ];
            return response($errors);
        }

        $attr = Attribute::findOrFail($id);
        $attr->name = $request->name;
        $attr->slug = $request->slug;
        $attr->save();
        $errors = [
            'errors' => false,
            'messages' => 'Sửa thành công!',
        ];
        return response($errors);

    }

    public function attribute($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('admin.attribute.attribute', compact('attribute'));
    }

    public function storeValue(Request $request, $attr_id)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => [
                    'required',
                    'max:190',
                    function ($attribute, $value, $fail) use ($attr_id) {
                        if (Attribute_value::where([
                            ['attribute_id', '=', $attr_id],
                            ['name', '=', $value],
                        ])->exists()) {
                            $fail('Tên chủng loại đã tồn tại.');
                        }
                    },

                ],
                'slug' => [
                    'required',
                    'regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/',
                    'max:190',
                    function ($attribute, $value, $fail) use ($attr_id) {
                        if (Attribute_value::where([
                            ['attribute_id', '=', $attr_id],
                            ['slug', '=', $value],
                        ])->exists()) {
                            $fail('Đường dẫn tĩnh đã tồn tại.');
                        }
                    },

                ],
                'value' => [
                    'nullable',
                ],
            ],
            [
                // tên chủng loại
                'name.required' => 'Mời nhập tên chủng loại.',
                'name.unique' => 'Tên chủng loại đã tồn tại.',
                'name.max' => 'Tên chủng loại không vượt quá 190 kí tự.',
                // 'name.min' => 'Tên chủng loại nhiều hơn 2 kí tự.',
                // slug
                'slug.required' => 'Mời nhập đường dẫn.',
                'slug.unique' => 'Đường dẫn đã tồn tại.',
                'slug.max' => 'Đường dẫn không vượt quá 190 kí tự.',
                // 'slug.min' => 'Đường dẫn phải nhiều hơn 2 kí tự.',
                'slug.regex' => 'Không đúng định dạng đường dẫn.',

            ],
        );

        if ($validator->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validator->errors(),
            ];
            return response($errors);
        }

        $attribute = new Attribute_value();
        $attribute->attribute_id = $attr_id;
        $attribute->name = $request->name;
        $attribute->slug = $request->slug;
        $attribute->save();
        $errors = [
            'errors' => false,
            'messages' => 'Thêm chủng loại thành công!',
        ];
        return response($errors);

    }

    public function getAttributeValue(Request $request, $attr_id)
    {
        $columns = ['name', 'slug'];
        $limit = $request->input('length');
        $start = $request->input('start');
        $orders = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $total = Attribute::count();

        $data = Attribute_value::where('attribute_id', $attr_id)
            ->where('name', 'like', "%$search%")
            ->offset($start)->limit($limit)->orderBy($orders, $dir)->get();
        $json_data = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($total),
            'recordsFiltered' => intval($total),
            'data' => $data,
        ];
        return response()->json($json_data);
    }

    public function destroyValue(Request $request)
    {
        $id = $request->id;
        $check = Attribute_value::destroy($id);
        if ($check) {
            return response()->json([
                'errors' => false,
                'messages' => 'Xoá thành công',
                'data' => $request->all(),
            ]);
        } else {
            return response()->json([
                'errors' => true,
                'messages' => 'Xoá không thành công',
                'data' => $request->all(),
            ]);
        }
    }

    public function editValue($id)
    {
        $attribute_value = Attribute_value::findOrFail($id);
        return view('admin.attribute.edit_value', compact('attribute_value'));
    }

    public function updateValue(Request $request, $id)
    {
        $attribute_value = Attribute_value::findOrFail($id);
        $validator = Validator::make(
            $request->all(),
            [
                'name' => [
                    'required',
                    'max:190',
                    function ($attribute, $value, $fail) use ($attribute_value) {
                        if (Attribute_value::where([
                            ['attribute_id', '=', $attribute_value->attribute_id],
                            ['name', '<>', $value],
                        ])->exists()) {
                            $fail('Tên chủng loại đã tồn tại.');
                        }
                    },
                ],
                'slug' => [
                    'required',
                    'regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/',
                    'max:190',
                    function ($attribute, $value, $fail) use ($attribute_value) {
                        if (Attribute_value::where([
                            ['attribute_id', '=', $attribute_value->attribute_id],
                            ['slug', '<>', $value],
                        ])->exists()) {
                            $fail('Đường dẫn tĩnh đã tồn tại.');
                        }
                    },

                ],
                'value' => 'nullable',
            ],
            [
                // tên chủng loại
                'name.required' => 'Mời nhập tên chủng loại.',
                'name.unique' => 'Tên chủng loại đã tồn tại.',
                'name.max' => 'Tên chủng loại không vượt quá 190 kí tự.',
                // slug
                'slug.required' => 'Mời nhập đường dẫn.',
                'slug.unique' => 'Đường dẫn đã tồn tại.',
                'slug.max' => 'Đường dẫn không vượt quá 190 kí tự.',
                'slug.regex' => 'Không đúng định dạng đường dẫn.',
            ],
        );

        if ($validator->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validator->errors(),
            ];
            return response($errors);
        }

        $attribute_value->name = $request->name;
        $attribute_value->slug = $request->slug;
        $attribute_value->value = $request->value;
        $attribute_value->save();
        $errors = [
            'errors' => false,
            'messages' => 'Cập nhật chủng loại thành công!',
        ];
        return response($errors);

    }

    public function dataValues(Request $request)
    {
        $data = [];
        $term = trim($request->q);
        $attr_id = trim($request->s);

        if (strlen($term) <= 0) {
            $data = Attribute_value::where('attribute_id', '=', $attr_id)->orderBy('name', 'desc')->limit(100)->get();
            return response()->json($data);
        } else {
            $data = Attribute_value::where('attribute_id', '=', $attr_id)->where('name', 'LIKE', "%$term%")
                ->orderBy('name', 'desc')->limit(100)
                ->get();
            return response()->json($data);
        }
    }
}
