<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, $cate)
    {
        $category = Category::where('slug', '=', $cate)->first();
        $cate_id = $category->id;
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
        $attr = $request->input('attr');
        $search = $request->input('search');
        $products = Product::where('status', '=', 1)
            ->where(function ($query) use ($search, $attr, $cate_id) {
                if (!empty($search)) {
                    $query->where('products.name', 'LIKE', "%$search%");
                }
                $product_id_arr = [];
                if (!empty($cate_id)) {
                    $product_ids = Product_category::where('category_id', '=', $cate_id)->get()->toArray();
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
                return $query;
            })
            ->orderBy($orderBy['key'], $orderBy['value'])->paginate(1);
        $products->load('galleries', 'variants');
        $products->appends(['search' => $search]);
        $list_categories = Category::where('parent_id', '<>', 0)->orderBy('name', 'asc')->get();

        $attributes = Attribute::all();
        $attributes->load('values');

        return view('client.category', compact('products', 'list_categories', 'attributes', 'category'));
    }
}
