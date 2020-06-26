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
            'email' => 'bail | required',
            'password' => 'bail | required',
            'first_name' => 'bail | required',
            'last_name' => 'bail | required',
            'phone_number' => 'bail | required',
            'address' => 'bail | required',
        ];
    }

    public function messages()
    {
        return [
            
        ];
        
    }
}
