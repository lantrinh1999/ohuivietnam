<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function home(Request $request)
    {
        $start = $request->start;

        $end = $request->end;
        if (empty($start)) {
            $start = date("Y-m-d");
        }
        if (empty($end)) {
            $end = strtotime('+30 days', strtotime($start));
        }

        $date_from = strtotime($start); // Convert date to a UNIX timestamp
        $date_to = strtotime($end);
        $arrr = [];

        $orders = Order::where('status', 4)->where([
            ['updated_at', '>=', $start . ' 00:00:00'],
            ['.updated_at', '<=', $end . ' 23:59:59'],

        ])->get()->toArray();
        $data_date2 = $orders;
        for ($i = $date_from; $i <= $date_to; $i += 86400) {
            $date = date("Y-m-d", $i);
            $first_2 = reset($data_date2);
            if (date_format(date_create($first_2['updated_at']), 'Y-m-d') == $date) {
                $arrr[] = $first_2;
                array_shift($data_date2);
            } else {
                $arrr[] = [
                    'updated_at' => $date,
                    'total' => 0,
                ];
            }
        }
        $data = [
            'date' => array_column($arrr, 'updated_at'),
            'total' => array_column($arrr, 'total'),
        ];
        return response()->json($data);

    }

}
