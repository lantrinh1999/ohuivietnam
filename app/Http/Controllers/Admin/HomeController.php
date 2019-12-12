<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::where('status', '=', 1)->count();
        $products = Product::count();
        $customers = User::where('role', '=', 1)->count();
        $comments = Comment::count();
        return view('admin.home.index', compact('orders', 'products', 'customers', 'comments'));
    }

    public function getNewOrders(Request $request)
    {

        $limit = 5;
        $page = (int) $request->page;
        if ($page < 1) {
            $page = 1;
        }
        $start = ($limit * $page) - $limit;
        $newOrders = Order::where('status', '=', 1)
            ->offset($start)
            ->limit($limit + 1)
            ->get();
        return response()->json($newOrders);

    }

}
