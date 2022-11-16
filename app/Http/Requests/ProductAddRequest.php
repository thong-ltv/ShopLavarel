<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|unique:products|max:255|min:10',
            'price' => 'required',
            'color' => 'required',
            'sizes' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'name.unique' => 'Tên không được phép trùng',
            'name.max' => 'Tên không được phép quá 255 kí tự',
            'name.min' => 'Tên không được phép ít hơn 10 kí tự',
            'price.required' => 'Giá không được phép để trống',
            'color.required' => 'Màu sắc không được phép để trống',
            'sizes.required' => 'Kích thước không được phép để trống',
            'category_id.required' => 'Danh mục không được phép để trống',
            'content.required' => 'Nội dung không được phép để trống',
            
        ];
    }
}
