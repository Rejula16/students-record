<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $this->authService->register($request->all());

        return redirect('/login');
    }

    public function login(Request $request)
    {
        if (!$this->authService->login($request->all())) {
            return back()->with('error', 'Invalid login');
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        $this->authService->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    
    // protected $authService;

    // public function __construct(AuthService $authService)
    // {
    //     $this->authService = $authService;
    // }

    // public function register(Request $request)
    // {
    //     $this->authService->register($request->all());

    //     return redirect('/login');
    // }

    // public function login(Request $request)
    // {
    //     $token = $this->authService->login($request->all());

    //     if (!$token) {
    //         return back()->with('error','Invalid login');
    //     }

    //     return redirect('/students');
    // }

    // public function logout(Request $request)
    // {
    //     auth()->user()->tokens()->delete();

    //     return redirect('/login');
    // }
}
