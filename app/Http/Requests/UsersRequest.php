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
            'email' => 'bail | required ',
            // ít nhất 1 kí tự thường , 1 kí tự in hoa , 1 số (kí tự đặt biệt)(?=.*?[#?!@$%^&*-])
            'password' => 'bail | required | regex:/^.*(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d).*$/',
            'first_name' => 'bail | required',
            'last_name' => 'bail | required',
            'phone_number' => 'bail | required | regex:/^0[0-9]{9}$/',
            'address' => 'bail | required | regex',
        ];
    }

    public function messages()
    {
        return [
            
        ];
        
    }
}
