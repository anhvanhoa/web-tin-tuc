<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|email',
            'roles' => 'required|in:admin,user',
            'gender' => 'required|in:male,female,other',
            'status' => 'nullable|in:active,locked',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'avatar.image' => 'Ảnh không đúng định dạng',
            'avatar.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg',
            'avatar.max' => 'Ảnh không được vượt quá 2MB',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'roles.required' => 'Vai trò không được để trống',
            'roles.in' => 'Vai trò không hợp lệ',
            'gender.required' => 'Giới tính không được để trống',
            'gender.in' => 'Giới tính không hợp lệ',
            'status.required' => 'Trạng thái không được để trống',
            'status.in' => 'Trạng thái không hợp lệ',
        ];
    }
}
