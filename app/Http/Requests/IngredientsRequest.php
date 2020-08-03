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
            'name' => 'bail | required | regex: /[a-zA-Z]/ | max:255',
            'ingredient_unit' => 'bail | required | regex: /[a-zA-Z]/ | max:255',
            'amount_stock' => 'bail | required | digits_between:1,7 '
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Tên nguyên liệu không được để trống!",
            'ingredient_unit.required' => "Đơn vị không được để trống!",
            'amount_stock.required' => "Số lượng không được để trống!",

            'name.regex' => "Tên nguyên liệu không hợp lệ!",
            'ingredient_unit.regex' => "Đơn vị không hợp lệ!",
            'amount_stock.digits_between' => "Số lượng không hợp lệ!",

            'name.max' => 'Tên nguyên liệu chỉ được tối đa 255 kí tự.',
            'ingredient_unit.max' => 'Đơn vị chỉ được tối đa 255 kí tự.',

            
        ];
    }
}
