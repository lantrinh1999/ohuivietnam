<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $_data = [];
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        return view('admin.categories.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:categories,name|max:190|min:2',
                'slug' => 'required|unique:categories,slug|max:190|min:2|regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/',
                'parent_id' => [
                    'nullable',
                    // function ($attribute, $value, $fail) {
                    //     if (Category::where('id', '=', $value)->exists() && $value != 0) {
                    //         return $fail('Mời chọn danh mục cha');
                    //     }
                    // },

                ],
            ],
            [
                // tên danh mục
                'name.required' => 'Mời nhập tên danh mục.',
                'name.unique' => 'Tên danh mục đã tồn tại.',
                'name.max' => 'Tên danh mục không vượt quá 190 kí tự.',
                'name.min' => 'Tên danh mục nhiều hơn 2 kí tự.',
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

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->save();
        $errors = [
            'errors' => false,
            'messages' => 'Thêm danh mục thành công!',
        ];
        return response($errors);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id', '=', 0)->get();
        // dd($category);
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => [
                    'required',
                    'unique:categories,name,' . $id,
                    'max:190',
                    'min:2',
                ],
                'slug' => [
                    'required',
                    'unique:categories,slug,' . $id,
                    'max:190',
                    'min:2',
                    'regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/',

                ],
                'parent_id' => [
                    'nullable',

                ],
            ],
            [
                // tên danh mục
                'name.required' => 'Mời nhập tên danh mục.',
                'name.unique' => 'Tên danh mục đã tồn tại.',
                'name.max' => 'Tên danh mục không vượt quá 190 kí tự.',
                'name.min' => 'Tên danh mục nhiều hơn 2 kí tự.',
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->save();
        $errors = [
            'errors' => false,
            'messages' => 'Thêm danh mục thành công!',
        ];
        return response($errors);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $check = Category::destroy($id);
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
    /**
     * Undocumented function
     *
     * @return void
     */
    public function categoriesList(Request $request)
    {
        $ac = Category::orderBy('name', 'asc')->get();
        if (!empty($ac) || count($ac) > 0 || $ac->count() > 0) {
            $c = $this->recursiveCategories($ac);
        } else {
            $c = [];
        }
        // dd(DataTables::of($c)->make(true));
        return DataTables::of($c)->make(true);
    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function multiDel(Request $request)
    {
        $categories = $request->categories;
        $arr = explode(',', $categories);
        $check = Category::destroy($arr);
        Category::whereIn('parent_id', $arr)->update(['parent_id' => 0]);
        if ($check) {
            return response()->json([
                'error' => false,
                'message' => 'success',
                'data' => $arr,
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Có gì đó sai sai',
                'data' => $arr,
            ]);
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $categories
     * @param integer $parent_id
     * @param integer $step
     * @return void
     */
    public function recursiveCategories($categories, $parent_id = 0, $step = 0)
    {
        foreach ($categories as $key => $item) {
            if ($item['parent_id'] == $parent_id) {
                // $parent = Category::find($parent_id);
                // $parent_name = $parent['name'];
                // $c = $item;
                // $c['parent_name'] = $parent_name;
                // $c['step'] = $step;
                // $this->_data['categoriesDataTable'][] = $c;
                $item['step'] = $step;
                $this->_data['categoriesDataTable'][] = $item;
                unset($categories[$key]);
                $this->recursiveCategories($categories, $item['id'], $step + 1);
            }
        }
        return $this->_data['categoriesDataTable'];
    }
}
