<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
    protected $perPageUser = 10;

    public function getModel()
    {
        return User::class;
    }

    public function register($request)
    {
        $account = $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $account;
    }

    public function checkExists ($email)
    {
        $check = $this->model->where('email', $email)->first();

        if($check){
            return true;
        } else {
            return false;
        }
    }
}
