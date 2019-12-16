<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Attribute_value;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Product_attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = Attribute::all();
        $categories = Category::getAll()->with('getChild')->get();
        // dd($categories);
        return view('admin.products.add', compact('attributes', 'categories'));
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
                'name' => 'required|unique:products,name|max:191|min:2',
                'slug' => 'required|unique:products,slug|max:191|min:2|regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/',
                'category_id' => 'required',
                'g_regular_price' => [
                    'numeric',
                    'gt:0',
                    'required',
                ],
                'g_sale_price' => 'nullable|numeric|gt:0|lt:g_regular_price',
                'status' => 'required',
                // 'data' => 'nullable',
                'is_simple' => 'required',
                // 'data' => 'required_unless:is_simple,-1',
                'data.*.regular_price' => 'required|gt:0',
                'data.*.sale_price' => 'nullable|numeric|gt:0|lt:data.*.regular_price',
                'data.*.status' => 'required',
                'data.*.value_id' => 'exists:attribute_value,id',
            ],
            [
                // tên sản phẩm
                'name.required' => 'Mời nhập tên sản phẩm.',
                'name.unique' => 'Tên sản phẩm đã tồn tại.',
                'name.max' => 'Tên sản phẩm không vượt quá 191 kí tự.',
                'name.min' => 'Tên sản phẩm nhiều hơn 2 kí tự.',
                // slug
                'slug.required' => 'Mời nhập đường dẫn.',
                'status.required' => 'Mời chọn trạng thái.',
                'status.in' => 'Trạng thái không hợp lệ',
                'data.*.status.required' => 'Mời chọn trạng thái.',
                'data.*.status.in' => 'Trạng thái không hợp lệ',
                'slug.unique' => 'Đường dẫn đã tồn tại.',
                'slug.max' => 'Đường dẫn không vượt quá 191 kí tự.',
                'slug.min' => 'Đường dẫn phải nhiều hơn 2 kí tự.',
                'slug.regex' => 'Không đúng định dạng đường dẫn.',
                'category_id.required' => 'Mời chọn danh mục.',

                'data.*.regular_price.required' => 'Mời nhập giá',
                'data.*.regular_price.gt' => 'Giá phải lớn hơn 0',
                'data.*.regular_price.numeric' => 'Giá phải là số',

                'data.*.sale_price.required' => 'Mời nhập giá',
                'data.*.sale_price.gt' => 'Giá phải lớn hơn 0',
                'data.*.sale_price.numeric' => 'Giá phải là số',
                'data.*.sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá bán',

                'g_sale_price.required' => 'Mời nhập giá',
                'g_sale_price.required' => 'Mời nhập giá',
                'g_sale_price.gt' => 'Giá phải lớn hơn 0',
                'g_sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá bán',

                'g_regular_price.required' => 'Mời nhập giá',
                'g_regular_price.required' => 'Mời nhập giá',
                'g_regular_price.required_if' => 'Mời nhập giá',
                'g_regular_price.gt' => 'Giá phải lớn hơn 0',
                'g_regular_price.numeric' => 'Giá phải là số',
                'g_sale_prices.numeric' => 'Giá phải là số',
                'data.*.value_id.required' => 'Mời chọn giá trị',
                'data.*.status.required' => 'Mời chọn trạng thái',

            ],
        );

        if ($validator->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validator->errors(),
            ];
            return response($errors);
        }

        // for ($i=1; $i < 10; $i++) {
        // product data
        $product = new Product();
        $product->name = $request->name;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->image = $request->image;
        $product->is_simple = $request->is_simple;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->regular_price = $request->g_regular_price;
        $product->sale_price = $request->g_sale_price;
        $product->status = $request->status;
        $product->save();

        // product_id
        $product_id = $product->id;

        // product_category
        $product->categories()->sync(explode(',', $request->category_id));

        // thư viện ảnh

        if (!empty($request->gallery)) {
            $galleries = [];
            foreach ($request->gallery as $value) {
                $galleries[] = [
                    'product_id' => $product_id,
                    'url' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }
            Gallery::insert($galleries);
        }

        // biến thể
        if (!empty($request->data)) {
            foreach ($request->data as $key => $variant) {
                $variant['product_id'] = $product_id;
                $variant['product_id'] = $product_id;
                $variant['attribute_id'] = Attribute_value::getAttributeID($variant['value_id']);
                $variant['created_at'] = date('Y-m-d H:i:s');
                Product_attribute::insert($variant);
            }

            // }

            // dd($request->data);
            return response()->json([
                'errors' => false,
                'data' => $request->all(),
            ]);
        }
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
        $product = Product::where('id', '=', $id)->with(['variants' => function ($query) {
            $query->with('value', 'attribute');
        }])->first();
        $product->load('categories', 'galleries');
        // dd($product->categories);

        $attributes = Attribute::all();
        $categories = Category::getAll()->with('getChild')->get();

        return view('admin.products.edit', compact('product', 'attributes', 'categories'));
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
                    'unique:products,name,' . $id,
                    'max:191',
                    'min:2',
                ],
                'slug' => [
                    'required',
                    'unique:products,slug,' . $id,
                    'max:191',
                    'min:2',
                    'regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/',
                ],
                'category_id' => 'required',
                'g_regular_price' => [
                    'numeric',
                    'gt:0',
                    'required',
                ],
                'g_sale_price' => 'nullable|numeric|gt:0|lt:g_regular_price',
                'status' => 'required',
                // 'data' => 'nullable',
                'is_simple' => 'required',
                // 'data' => 'required_unless:is_simple,-1',
                'data.*.regular_price' => 'required|gt:0',
                'data.*.sale_price' => 'nullable|numeric|gt:0|lt:data.*.regular_price',
                'data.*.status' => 'required',
                'data.*.value_id' => 'exists:attribute_value,id',
            ],
            [
                // tên sản phẩm
                'name.required' => 'Mời nhập tên sản phẩm.',
                'name.unique' => 'Tên sản phẩm đã tồn tại.',
                'name.max' => 'Tên sản phẩm không vượt quá 191 kí tự.',
                'name.min' => 'Tên sản phẩm nhiều hơn 2 kí tự.',
                // slug
                'slug.required' => 'Mời nhập đường dẫn.',
                'status.required' => 'Mời chọn trạng thái.',
                'status.in' => 'Trạng thái không hợp lệ',
                'data.*.status.required' => 'Mời chọn trạng thái.',
                'data.*.status.in' => 'Trạng thái không hợp lệ',
                'slug.unique' => 'Đường dẫn đã tồn tại.',
                'slug.max' => 'Đường dẫn không vượt quá 191 kí tự.',
                'slug.min' => 'Đường dẫn phải nhiều hơn 2 kí tự.',
                'slug.regex' => 'Không đúng định dạng đường dẫn.',
                'category_id.required' => 'Mời chọn danh mục.',

                'data.*.regular_price.required' => 'Mời nhập giá',
                'data.*.regular_price.gt' => 'Giá phải lớn hơn 0',
                'data.*.regular_price.numeric' => 'Giá phải là số',

                'data.*.sale_price.required' => 'Mời nhập giá',
                'data.*.sale_price.gt' => 'Giá phải lớn hơn 0',
                'data.*.sale_price.numeric' => 'Giá phải là số',
                'data.*.sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá bán',

                'g_sale_price.required' => 'Mời nhập giá',
                'g_sale_price.required' => 'Mời nhập giá',
                'g_sale_price.gt' => 'Giá phải lớn hơn 0',
                'g_sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá bán',

                'g_regular_price.required' => 'Mời nhập giá',
                'g_regular_price.required' => 'Mời nhập giá',
                'g_regular_price.required_if' => 'Mời nhập giá',
                'g_regular_price.gt' => 'Giá phải lớn hơn 0',
                'g_regular_price.numeric' => 'Giá phải là số',
                'g_sale_prices.numeric' => 'Giá phải là số',
                'data.*.value_id.required' => 'Mời chọn giá trị',
                'data.*.status.required' => 'Mời chọn trạng thái',

            ],
        );

        if ($validator->fails()) {
            $errors = [
                'errors' => true,
                'messages' => $validator->errors(),
            ];
            return response($errors);
        }

        // for ($i=1; $i < 10; $i++) {
        // product data
        $product = Product::find($id);
        $product->name = $request->name;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->image = $request->image;
        $product->is_simple = $request->is_simple;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->regular_price = $request->g_regular_price;
        $product->sale_price = $request->g_sale_price;
        $product->status = $request->status;
        $product->save();

        // product_id
        $product_id = $product->id;

        // product_category
        $product->categories()->sync(explode(',', $request->category_id));

        // thư viện ảnh

        if (!empty($request->gallery)) {
            Gallery::where('product_id', $product_id)->delete();
            $galleries = [];
            foreach ($request->gallery as $value) {
                $galleries[] = [
                    'product_id' => $product_id,
                    'url' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }
            Gallery::insert($galleries);
        }

        // biến thể
        if (!empty($request->data)) {
            Product_attribute::where('product_id', $product_id)->delete();
            foreach ($request->data as $key => $variant) {
                $variant['product_id'] = $product_id;
                $variant['product_id'] = $product_id;
                $variant['attribute_id'] = Attribute_value::getAttributeID($variant['value_id']);
                $variant['created_at'] = date('Y-m-d H:i:s');
                Product_attribute::insert($variant);
            }
            return response()->json([
                'errors' => false,
                'data' => $request->all(),
            ]);
        }
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
        $check = Product::destroy($id);
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

    public function getData(Request $request)
    {
        $columns = ['products.id', 'products.name'];
        $limit = $request->input('length');
        $start = $request->input('start');
        $orders = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('searchs');
        $status = $request->input('status');
        $args = [];
        $args[] = ['products.name', 'like', "%$search%"];
        if ($status != null) {
            $args[] = ['products.status', '=', $status];
        }
        // dd($args);
        $total = Product::count();
        $data = Product::where($args)
            ->select('products.*')->offset($start)->limit($limit)->orderBy($orders, $dir)->get();
        $data->load('categories');

        foreach ($data as $key => $value) {
            $data[$key]['create'] = date('d-m-Y', strtotime($value['created_at']));

        }
        $json_data = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($total),
            'recordsFiltered' => intval($total),
            'data' => $data,
        ];
        return response($json_data);

    }

    public function multiDel(Request $request)
    {
        $products = $request->products;
        $arr = explode(',', $products);
        $check = Product::destroy($arr);
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
}
