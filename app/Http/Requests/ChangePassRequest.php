<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Mật khẩu hiện tại không được để trống',
            'password.required' => 'Mật khẩu mới không được để trống',
            'password.min' => 'Mật khẩu mới phải chứa ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu mới không trùng khớp',
            'password_confirmation.required' => 'Xác nhận mật khẩu không được để trống',
            'password_confirmation.min' => 'Xác nhận mật khẩu phải chứa ít nhất 6 ký tự',
            'password_confirmation.same' => 'Xác nhận mật khẩu không trùng khớp',
        ];
    }
}
