<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = Auth::guard('api')->attempt($credentials);

        if($token) {
            $user = Auth::guard('api')->user();

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
                'message' => 'login failed',
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('api')->logout();
    
        return response()->json([
            'status' => 200,
            'message' => 'success',
        ]);
    }

    public function me()
    {
        $user = Auth::guard('api')->user();

        if($user) {
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'user'=> $user
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'failed',
                'user'=> $user
            ]);
        }
    }

    public function register(Request $request)
    {
        $user =  User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => 0,
        ]);

        $token = Auth::guard('api')->login($user);
       
        return response()->json([
            'status' => 200,
            'message' => 'user created',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function login_form()
    {
        return view('auth/login');
    }

    public function register_form()
    {
        return view('auth/register');
    }
}
