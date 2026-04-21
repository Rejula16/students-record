<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
     public function register($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function login($data)
    {
        return Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }
    // public function register($data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    // public function login($data)
    // {
    //     $user = User::where('email', $data['email'])->first();

    //     if (!$user || !Hash::check($data['password'], $user->password)) {
    //         return false;
    //     }

    //     return $user->createToken('token')->plainTextToken;
    // }
}
