<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'product_colors' => 'required',
            'product_sizes' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'price.required' => 'Giá không được phép để trống',
            'product_colors.required' => 'Màu sắc không được để trống',
            'product_sizes.required' => 'Kích thước không được để trống',
            'category_id.required' => 'Danh mục không được phép để trống',
            'content.required' => 'Nội dung không được phép để trống',
            
        ];
    }
}
