<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getLogin() {
        return view('users.login');   
    }
    public function postLogin(Request $request) {
        
    }
    public function getRegister() {
        return view('users.register');
    }
    public function postRegister(Request $request){
        
    }
}
