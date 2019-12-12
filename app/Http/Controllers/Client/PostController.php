<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
class PostController extends Controller
{
    public function list_post(){
        $posts = Post::paginate(9);
        return view('client.blog',compact('posts'));
    }

    public function detail_post($slug){
        $post = Post::where('slug',$slug)->first();
        return view('client.blog-detail',compact('post'));
    }
}
