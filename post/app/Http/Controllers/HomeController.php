<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
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

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = Auth::guard('api')->attempt($credentials);
       
        $user = Auth::guard('api')->user();

        if($token) {
            return response()->json([
                'status' => 200,
                'message' => 'login success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'login failed'
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('api')->logout();
    }

    public function me()
    {
        $user = Auth::guard('api')->user();

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'user'=> $user
        ]);
    }
}