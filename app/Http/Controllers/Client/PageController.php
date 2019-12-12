<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function contact()
    {
        return view('client.page');
    }
}
