<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
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
Route::get('/login',[LoginController::class,'getLogin'])->name('login');
Route::post('/login',[LoginController::class,'postLogin'])->name('login');
// Route::match(['GET','POST'],'/login',[LoginController::class,'login'])->name('login');

// REGISTER
Route::get('/register',[LoginController::class,'getRegister'])->name('register');
Route::post('/register',[LoginController::class,'postRegister'])->name('register');
// Route::match(['GET','POST'],'/register',[LoginController::class,'register'])->name('register');

// LOGOUT
Route::get('/logout',[LoginController::class,'logOut'])->name('logout');

// TICKET
Route::get('/ticket',[HomeController::class,'listTicket'])->name('listTicket');

// SEARCH
Route::get('/search',[HomeController::class,'searchFlight'])->name('searchFlight');

// ORDER TICKET
Route::get('order/{id}',[OrderController::class,'getOrderTicket'])->name('getOrderTicket');
Route::get('order_now/{id}',[OrderController::class,'orderTicket'])->name('orderTicket');

// Giao diện Admin - Quản trị

Route::middleware(['auth','check.role'])->prefix('admin')->group(function (){

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

    // Flight Administration
    Route::prefix('flights')->group(function(){
        Route::get('/list',[FlightsController::class,'listFlight'])->name('listFlight');
        Route::get('/add',[FlightsController::class,'getAdd'])->name('addFlight');
        Route::post('/add',[FlightsController::class,'postAdd'])->name('addFlight');
        Route::get('/edit/{id}',[FlightsController::class,'getEdit'])->name('editFlight');
        Route::post('/edit/{id}',[FlightsController::class,'postEdit'])->name('editFlight');
        Route::get('/delete/{id}',[FlightsController::class,'deleteFlight'])->name('deleteFlight');
    });
    
    // Ticket Administration
    Route::prefix('tickets')->group(function(){
        Route::get('/list',[TicketController::class,'listTicket'])->name('listTicket');
        Route::get('/add',[TicketController::class,'getAdd'])->name('addTicket');
        Route::post('/add',[TicketController::class,'postAdd'])->name('addTicket');
        Route::get('/edit/{id}',[TicketController::class,'getEdit'])->name('editTicket');
        Route::post('/edit/{id}',[TicketController::class,'postEdit'])->name('editTicket');
        Route::get('/delete/{id}',[TicketController::class,'deleteTicket'])->name('deleteTicket');
    });

    // Booking Ticket Administration
    Route::prefix('flight')->group(function(){
        Route::get('/list',[BookingController::class,'listBookTicket'])->name('listBookTicket');
        Route::get('/detail',[BookingController::class,'detailBookTicket'])->name('detailBookTicket');
        // Route::post('/add',[,''])->name('');
        // Route::get('/edit/{id}',[,''])->name('');
        // Route::post('/edit/{id}',[,''])->name('');
        // Route::get('/delete/{id}',[,''])->name('');
    });

});



