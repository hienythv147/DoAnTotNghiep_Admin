<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientsRequest extends FormRequest
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
            'ingredient_name' => 'bail | required | regex: /[a-zA-Z]/',
            'ingredient_unit' => 'bail | required | regex: /[a-zA-Z]/',
            'amount_stock' => 'bail | required | regex: /[0-9]/'
        ];
    }

    public function messages()
    {
        return [
            'ingredient_name.required' => "Tên nguyên liệu không được để trống!",
            'ingredient_unit.required' => "Đơn vị không được để trống!",
            'amount_stock.required' => "Số lượng không được để trống!",

            'ingredient_name.regex' => "Tên nguyên liệu không hợp lệ!",
            'ingredient_unit.regex' => "Đơn vị không hợp lệ!",
            'amount_stock.regex' => "Số lượng không hợp lệ!",
            
        ];
    }
}
