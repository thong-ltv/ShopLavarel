<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được trùng',
            'name.unique' => 'Tên không được trùng',
            'name.max' => 'Tên không được quá 255 kí tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email không được trùng',
            'password' => 'Mật khẩu không được để trống',
            'role_id' => 'Vai trò không được để trống'
        ];
    }
}
