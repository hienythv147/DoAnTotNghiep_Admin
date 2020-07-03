<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomersRequest extends FormRequest
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
            'first_name' => 'bail | required',
            'last_name' => 'bail | required',
            'phone_number' => 'bail | required | regex:/^0[0-9]{9}$/'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Tên không được để trống!',
            'last_name.required' => 'Họ không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống!',
            'phone_number.regex' => 'Số điện thoại không hợp lệ'
        ];
    }
}
