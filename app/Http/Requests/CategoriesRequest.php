<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'name' => 'bail | required | regex:/[a-zA-Z]/ | max:255',
            'category_type' => 'bail | required | regex:/[12]/ | max: 255',
            // 'category_image' => 'bail | required | max:2048 | mimes: jpg,jpeg,png,gif',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên loại sản phẩm không được để trống!',
            'category_type.required' => 'Loại sản phẩm không hợp lệ!',
            // 'category_image.required' => 'Chưa chọn file ảnh!',

            'name.regex' => 'Loại sản phẩm không hợp lệ!',
            'category_type.regex' => 'Loại sản phẩm không tồn tại!',

            'name.max' => 'Tên loại sản phẩm chỉ được tối đa 255 kí tự.',

            // 'category_image.mimes' => 'File được chọn phải là định dạng ảnh!',

            // 'category_image.max' => 'File không được quá 2MB',
        ];
    }
}
