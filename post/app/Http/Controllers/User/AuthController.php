<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
