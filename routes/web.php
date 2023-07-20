<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirportController;
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
Route::get('/login',[UserController::class,'getLogin'])->name('login');
Route::post('/login',[UserController::class,'postLogin'])->name('login');

// REGISTER
Route::get('/register',[UserController::class,'getRegister'])->name('register');
Route::post('/register',[UserController::class,'postRegister'])->name('register');

// LOGOUT
Route::get('/logout',[UserController::class,'logOut'])->name('logout');


// Giao diện Admin - Quản trị

Route::group(['prefix' => 'admin'], function (){

    // DASHBOARD
    Route::get('/dashboard', function (){ return view('admin.dashboard'); })->name('admin.dashboard');

    // Account-Users Administration
    Route::prefix('users')->group(function(){
        Route::get('/list',[UserController::class,'listUser'])->name('listUser');
        Route::get('/add',[UserController::class,'getAdd'])->name('addUser');
        Route::post('/add',[UserController::class,'postAdd'])->name('addUser');
        Route::get('/edit/{id}',[UserController::class,'getEdit'])->name('editUser');
        Route::post('/edit/{id}',[UserController::class,'postEdit'])->name('editUser');
        Route::get('/delete/{id}',[UserController::class,'deleteUser'])->name('deleteUser');
    });

    // Airlines Administration
    Route::prefix('airlines')->group(function(){
        Route::get('/list',[AirlineController::class,'listAir'])->name('listAir');
        Route::get('/add',[AirlineController::class,'getAdd'])->name('addAir');
        Route::post('/add',[AirlineController::class,'postAdd'])->name('addAir');
        Route::get('/edit/{id}',[AirlineController::class,'getEdit'])->name('editAir');
        Route::post('/edit/{id}',[AirlineController::class,'postEdit'])->name('editAir');
        Route::get('/delete/{id}',[AirlineController::class,'deleteAir'])->name('deleteAir');
    });

    // Airport Administration
    Route::prefix('airport')->group(function(){
        Route::get('/list',[AirportController::class,'listAport'])->name('listAport');
        Route::get('/add',[AirportController::class,'getAdd'])->name('addAport');
        Route::post('/add',[AirportController::class,'postAdd'])->name('addAport');
        Route::get('/edit/{id}',[AirportController::class,'getEdit'])->name('editAport');
        Route::post('/edit/{id}',[AirportController::class,'postEdit'])->name('editAport');
        Route::get('/delete/{id}',[AirportController::class,'deleteAport'])->name('deleteAport');
    });

});



