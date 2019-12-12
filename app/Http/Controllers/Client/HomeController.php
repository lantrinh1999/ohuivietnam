<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Post;
use App\Models\Wishlist;
use App\Models\User;

use Auth;
class HomeController extends Controller
{
    public function index(){
        $productsNew = Product::orderBy('created_at','desc')->with('galleries', 'variants')->limit(8)->get();
        $productsRandom = Product::inRandomOrder()->with('galleries', 'variants')->limit(8)->get();
        // dd($productsNew);
        // $productsNotNull = Product::inRandomOrder()->with(['galleries', 'variants'])
        // ->whereHas('variants',function ($query) {
        //     $query->whereNotNull('sale_price');
        // })->limit(8)->get();
        $productsNotNull = Product::inRandomOrder()->whereNotNull('sale_price')->with(['galleries', 'variants'])->limit(8)->get();
        // dd($productsNotNull);
        $posts = Post::inRandomOrder()->limit(3)->get();
        return view('client.home',compact('productsNew', 'productsRandom', 'productsNotNull','posts'));
    }

    public function add_wishlist(Request $request){
        $check = Wishlist::where(['product_id' => $request->product_id,'user_id' => $request->user_id])->first();
        if($check){
            Wishlist::where([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
            ])->delete();
            return response([
                'errors' => false,
                'messages' => 'Đã bỏ thích',
            ]);
        }else{
            Wishlist::insert([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
            ]);
            return response([
                'errors' => false,
                'messages' => 'Đã thích',
            ]);
        }
    }

    public function wishlist(){
        $user = User::find(Auth::user()->id);
        $user->load('products');
        foreach ($user->products as $value) {
            // dd($value->id);
        }
        // dd($products);
        return view('client.wishlist');
    }
}
