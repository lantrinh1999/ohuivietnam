<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Attribute_value;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_attribute;
use App\Models\Product_category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        $orderBy = [];
        switch ($sort) {
            case 'az':
                $orderBy = [
                    'key' => 'name',
                    'value' => 'asc',
                ];
                break;
            case 'za':
                $orderBy = [
                    'key' => 'name',
                    'value' => 'desc',
                ];
                break;
            default:
                $orderBy = [
                    'key' => 'created_at',
                    'value' => 'desc',
                ];
                break;
        }
        $cate = $request->input('cate');
        $attr = $request->input('attr');
        $search = $request->input('search');
        $products = Product::where('status', '=', 1)
            ->where(function ($query) use ($search, $attr, $cate) {
                if (!empty($search)) {
                    $query->where('products.name', 'LIKE', "%$search%");
                }
                $product_id_arr = [];
                if (!empty($attr)) {
                    $value = Attribute_value::where('slug', '=', $attr)->first();
                    $value = $value->id;
                    $product_ids = Product_attribute::select('product_id')->where('value_id', $value)->get()->toArray();
                    $product_id_arr[] = array_column($product_ids, 'product_id');
                }
                if (!empty($cate)) {
                    $value = Category::where('slug', '=', $cate)->first();
                    $value = $value->id;
                    $product_ids = Product_category::where('category_id', '=', $value)->get()->toArray();
                    $product_id_arr[] = array_column($product_ids, 'product_id');
                    // dd($product_ids);
                }
                $count = count($product_id_arr);
                if ($count > 1) {
                    if ($count == 2) {
                        $query->whereIn('products.id', array_intersect($product_id_arr[0], $product_id_arr[1]));
                    }
                } elseif ($count == 1) {
                    $query->whereIn('products.id', $product_id_arr[0]);
                }
                // dd($product_id_arr);
                return $query;
            })
            ->orderBy($orderBy['key'], $orderBy['value'])->paginate(12);
        $products->load('galleries', 'variants');
        $products->appends(['search' => $search]);
        $list_categories = Category::where('parent_id', '<>', 0)->orderBy('name', 'asc')->get();

        $attributes = Attribute::all();
        $attributes->load('values');
        
       
        return view('client.shop', compact('products', 'list_categories', 'attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
