<?php

use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'));

Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);

Route::middleware('auth')->group(function () {

    Route::resource('students', StudentController::class);
    Route::post('/logout', [AuthController::class,'logout']);
});

Route::get('/', function () {
    return view('welcome');
});
