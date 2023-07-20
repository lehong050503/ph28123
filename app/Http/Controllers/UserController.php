<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // HOME

    public function getLogin() {
        return view('users.login');   
    }

    public function postLogin(Request $request) {

        // Lấy tài khoản đầu có email trùng với email được nhập vào
        $user = User::where('email', $request->email)->first();
        

        // Kiểm tra có tồn tại tài khoản có email được nhập không
        if(is_null($user->email)){
            // Không tồn tại trở lại login và báo lỗi
            return view('users.login')->with('msg_fail', 'Email is not registered.');
        }else{
            
            // Tồn tại thì kiểm tra request password có trùng vs password của tài khoản không
            if(Hash::check($request->password, $user->password)){
                Auth::login($user);
                // Check role 
                if($user->role == 1){
                    
                    return redirect()->route('admin.dashboard')->with('Logged in successfully','Welcome to Dashboard.');
                }
                return redirect('/');
            }else{
                return view('users.login')->with('msg_fail', 'Password is incorrect.');
            }
        }
    }

    public function getRegister() {
        return view('users.register');
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
                return view('users.login')->with('msg_success', 'You have successfully registered, please login.');
            }
        }
        return redirect()->back();
    }

    public function logOut() {
        Auth::logout();
        return redirect()->route('login');
    }


    // ADMIN

    public function listUser() {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }

    public function getAdd() {
        return view('admin.users.add');
    }

    public function postAdd(UserRequest $request) {
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
            $user->role = $request->role;
            $user->save();

            // Nếu tồn tại id
            if($user->id){
                toastr()->success('Successfully', 'Created Successfully');
                return redirect()->route('listUser');
            }
        }
        return redirect()->back();
    }

    public function getEdit($id) {
        $user = User::find($id);
        // dd($user);
        return view('admin.users.edit', compact('user'));
    }

    public function postEdit(EditUserRequest $request, $id) {
        $user = User::find($id);

        $currentPass = $request->input('password');
        $newPass = $request->input('new_password');

        // Check pass nhập vào có trùng vs pass trong db không
        if(Hash::check($currentPass, $user->password)){
            $data = [
                'username' => $request->username,
                'full_name' => $request->full_name,
                'date_of_birth' => $request->date_of_birth,
                'email' => $request->email,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                // 'password' => Hash::make($request->password), // bcrypt() tương tự 
                'credit_card_no' => $request->credit_card_no,
                'nationality' => $request->nationality,
                'cccd_passport' => $request->cccd_passport,
                'role' => $request->role
            ];

            // Kiểm tra khi nhập new pass
            if(!empty($newPass)){
                // Check pass 1 lần nữa
                if(Hash::check($currentPass, $user->password)){
                    // Pass đúng cập nhật pass mới
                    $user->password = Hash::make($newPass);
                }else{
                    // Pass sai
                    toastr()->error('Errors', 'You must enter the exact password of this account to be able to update this account.');
                    return back();
                }
                
            }
            
            // Không nhập new pass
            $user->update($data);
            toastr()->success('Successfully', 'Updated Successfully');
            return redirect()->route('editUser',$user->id);
        }else{
            toastr()->error('Errors', 'You must enter the exact password of this account to be able to update this account.');
            return redirect()->route('editUser',$user->id);
        }
    }

    public function deleteUser($id) {
        User::where('id',$id)->delete();
        toastr()->success('Successfully', 'Delete Successfully');
        return redirect()->route('listUser');
    }










}
