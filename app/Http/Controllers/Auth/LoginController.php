<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // HOME

    public function getLogin() {
        return view('auth.login');   
    }

    // public function postLogin(Request $request) {

    //     // Lấy tài khoản đầu có email trùng với email được nhập vào
    //     $user = User::where('email', $request->email)->first();
        

    //     // Kiểm tra có tồn tại tài khoản có email được nhập không
    //     if(is_null($user->email)){
    //         // Không tồn tại trở lại login và báo lỗi
    //         return view('auth.login')->with('msg_fail', 'Email is not registered.');
    //     }else{
            
    //         // Tồn tại thì kiểm tra request password có trùng vs password của tài khoản không
    //         if(Hash::check($request->password, $user->password)){
    //             Auth::login($user);
    //             // Check role 
    //             if($user->role == 1){
                    
    //                 return redirect()->route('admin.dashboard')->with('Logged in successfully','Welcome to Dashboard.');
    //             }
    //             return redirect('/');
    //         }else{
    //             return view('auth.login')->with('msg_fail', 'Password is incorrect.');
    //         }
    //     }
    // }

    public function postLogin(LoginRequest $request) {
        // Kiem tra khi nhan nut Login
        if($request->isMethod('POST')){
            // Kiem tra mat khau va email
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                // Mat khau va email dung
                toastr()->success('Logged in successfully','Welcome to Dashboard.');
                return redirect()->route('admin.dashboard');
            }else{
                // Mat khau va email sai
                return view('auth.login')->with('msg_fail', 'The password or email you entered is incorrect.');
            }
        }
        
    }

    public function getRegister() {
        return view('auth.register');
    }

    public function postRegister(UserRequest $request){
        // Nếu người dùng nhấn đăng ký
        // -> Tồn tại request POST
        if($request->isMethod('POST')){
            $user = new User();
            $user->username = $request->username;
            $user->full_name = $request->full_name;
            $user->date_of_birth = $request->date_of_birth;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password); // bcrypt() tương tự 
            $user->credit_card_no = $request->credit_card_no;
            $user->nationality = $request->nationality;
            $user->cccd_passport = $request->cccd_passport;
            $user->role = 0;
            $user->save();

            // Nếu tồn tại id
            if($user->id){
                return view('auth.login')->with('msg_success', 'You have successfully registered, please login.');
            }
        }
        return view('auth.register');
    }

    public function logOut() {
        Auth::logout();
        return redirect()->route('login');
    }


}
