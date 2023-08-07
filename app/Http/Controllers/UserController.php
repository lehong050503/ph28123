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
