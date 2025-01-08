<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|max:255',
            'slugs' => 'required|max:255|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|unique:categories,slugs,' . $this->id,
            'status' => 'required|in:active,inactive',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.max' => 'Tên danh mục không được quá 255 ký tự',
            'slugs.required' => 'Slugs không được để trống',
            'slugs.max' => 'Slugs không được quá 255 ký tự',
            'slugs.unique' => 'Slugs đã tồn tại',
            'slugs.regex' => 'Slugs không hợp lệ',
            'status.required' => 'Trạng thái không được để trống',
            'status.in' => 'Trạng thái không hợp lệ',
        ];
    }
}
