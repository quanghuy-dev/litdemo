<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(auth()->user());
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function home()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list_post()
    {
        $posts = Post::paginate(10);

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'current_page' => $posts->currentPage(),
            'last_page' => $posts->lastPage(),
            'data' => $posts,
        ]);
        
    }
    
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