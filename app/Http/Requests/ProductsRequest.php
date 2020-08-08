<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Products;
class ProductsRequest extends FormRequest
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
            'product_price' => 'bail | required | digits_between:4,7',
            //Trường được xác thực phải là một ảnh và đáp ứng các ràng buộc về kích thước được chỉ định bởi các tham số của rule.
            //dimensions:param_1,param_2,..param_n
            //Validation rule: Có tất cả 7 loại tham số:
            // min_width
            // min_height
            // max_width
            // max_height
            // ratio: giá trị tỉ lệ = chiều rộng / chiều cao hoặc bằng số float nào đó
            // width
            // height
            //xác thực phải là tệp ảnh, bao gồm các định dạng: jpeg, png, bmp, gif, svg, hoặc webp
            // 'product_image' => 'bail | image', 
            //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
            // 'product_image' => 'bail | required | max:2048 | mimes: jpg,jpeg,png,gif',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'product_price.required' => 'Giá tiền không được để trống.',
            // 'product_image.required' => 'Chưa chọn file ảnh!',
            
            'product_price.digits_between' => 'Đơn giá không hợp lệ.',

            'name.regex' => 'Tên sản phẩm không hợp lệ.',
            
            'name.max' => 'Tên sản phẩm chỉ được tối đa 255 kí tự.'
            // 'product_image.mimes' => 'File được chọn phải là định dạng ảnh!',

            // 'product_image.max' => 'File không được quá 2MB',
        ];
    }
}
