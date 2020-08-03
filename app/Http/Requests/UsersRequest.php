<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'regex: /[a-zA-Z]/', 'max:255'],
            'last_name' => ['required', 'regex: /[a-zA-Z]/', 'max:255'],
            'address' => ['required', 'regex: /[a-zA-Z]/', 'max:255'],
            'phone_number' => ['required', 'regex:/^0[0-9]{9}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6','max:20',
                            'regex:/^.*(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d).*$/'],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => "Tên không được để trống.",
            'last_name.required' => "Họ không được để trống.",
            'address.required' => "Địa chỉ không được để trống.",
            'phone_number.required' => "Số điện thoại không được để trống.",
            'email.required' => "Số điện thoại không được để trống.",
            'password.required' => "Số điện thoại không được để trống.",

            'first_name.regex' => "Tên không hợp lệ.",
            'last_name.regex' => "Họ không hợp lệ.",
            'address.regex' => "Địa chỉ không hợp lệ.",
            'phone_number.regex' => "Số điện thoại không hợp lệ.",
            'password.regex' => "Mật khẩu phải có ít nhất 1 chữ cái hoa và 1 kí tự đăc biệt.",

            'first_name.max' => "Tên không được quá 255 kí tự.",
            'last_name.max' => "Họ không được quá 255 kí tự.",
            'address.max' => "Địa chỉ không được quá 255 kí tự.",
            'email.max' => "Email không được quá 255 kí tự.",
            
            'password.min' => "Mật khẩu phải có ít nhất 6 kí tự.",
            'password.min' => "Mật khẩu chỉ được tối đa 20 kí tự.",

            'email.unique' => "Email đã tồn tại.",
        ];
        
    }
}
