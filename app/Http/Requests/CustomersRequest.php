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
            'first_name' => 'bail | required | regex:/[a-zA-Z]/ | max: 255',
            'last_name' => 'bail | required | regex:/[a-zA-Z]/ | max:255',
            'phone_number' => 'bail | required | regex:/^0[0-9]{9}$/'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Tên không được để trống!',
            'last_name.required' => 'Họ không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống!',

            'first_name.regex' => 'Tên không hợp lệ!',
            'last_name.regex' => 'Họ không hợp lệ!',
            'phone_number.regex' => 'Số điện thoại không hợp lệ',
            'first_name.max' => 'Tên nguyên liệu chỉ được tối đa 255 kí tự.',
            'last_name.max' => 'Tên nguyên liệu chỉ được tối đa 255 kí tự.',

        ];
    }
}
