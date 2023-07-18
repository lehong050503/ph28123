<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Giao diện phía người dùng

// HOME
Route::get('/',[HomeController::class,'index'])->name('home');

// LOGIN
Route::get('/login',[UserController::class,'getLogin']);
// Route::post('/login',[UserController::class,'']);

// REGISTER
Route::get('/register',[UserController::class,'getRegister']);

//


// Giao diện Admin - Quản trị

// DASHBOARD
Route::get('admin', function () {
    return view('admin.dashboard');
});


