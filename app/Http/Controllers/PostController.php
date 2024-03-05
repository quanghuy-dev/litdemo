<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class PostController extends Controller
{
    protected $userRepository;

    public function __construct(
        UserRepository $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    //Home Page
    public function home()
    {
        try {
            if(!Auth::check()) {
                return view('auth/login');
            }


        } catch (\Exception $e){

        }
    }
}
