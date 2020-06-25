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
            'roles_name' => 'bail | required |'
        ];
    }

    public function messages()
    {
        return [
            'roles_name.required' => 'Vai trò không được bỏ trống!'

        ];
        
    }
}
