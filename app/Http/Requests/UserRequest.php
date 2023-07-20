<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|min:5|max:10',
            'full_name' => 'required|min:8|max:19',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'date_of_birth' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:8|max:32',
            'repeat_password' => 'required|same:password',
            'credit_card_no' => 'required|min:10|max:20',
            'nationality' => 'required',
            'cccd_passport' => 'required|min:9|max:12',
            
        ];
    }
}
