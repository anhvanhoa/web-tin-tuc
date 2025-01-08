<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'slugs' => 'required|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|unique:tags,slugs,' . $this->id,
            'color' => 'required',
            'status' => 'required|in:active,inactive',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'slugs.required' => 'Slugs không được để trống',
            'slugs.regex' => 'Slugs không hợp lệ',
            'slugs.unique' => 'Slug đã tồn tại',
            'color.required' => 'Màu không được để trống',
            'status.required' => 'Trạng thái không được để trống',
            'status.in' => 'Trạng thái không hợp lệ',
        ];
    }
}
