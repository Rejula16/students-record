<?php

use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeatherController;

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'));

Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);

Route::middleware('auth')->group(function () {

    Route::resource('students', StudentController::class);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/weather', [WeatherController::class,'index'])->name('weather.index');
    Route::post('/weather', [WeatherController::class,'fetch'])->name('weather.fetch');
});

Route::get('/', function () {
    return view('welcome');
});
