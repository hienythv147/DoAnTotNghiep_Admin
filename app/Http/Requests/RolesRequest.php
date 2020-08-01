<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class RolesRequest extends FormRequest
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
        // https://viblo.asia/p/tap-21-validation-laravel-tiep-theo-gAm5yGaAZdb
        return [
            'name' => 'bail | required | regex: /[a-zA-Z]/ '
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Loại nhân viên không được bỏ trống!',
            
            'name.regex' => 'Loại nhân viên không hợp lệ!',
        ];
        
    }
}
