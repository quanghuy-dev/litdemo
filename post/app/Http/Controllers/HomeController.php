<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    // function home
    public function home()
    {
        $posts = Post::paginate(10);

        return view('home', ['posts' => $posts]);
    }
    
    // api for list post
    public function list_post()
    {
        $posts = Post::paginate(10);

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $posts,
        ]);
    }
    
    // api for detail post
    public function detail_post($id)
    {
        $post = Post::find($id);
       
        return response()->json([
            'status' => 200,
            'message' => 'login success',
            'data' => $post,
        ]);
    }
}