<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required',
            'content' => 'required',
            'tags' => 'required',
            'description' => 'required|max:500',
            'status' => 'required|in:draft,published',
            'slugs' => 'required|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|unique:posts,slugs,' . $this->id
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Vui lòng chọn danh mục',
            'category_id.exists' => 'Danh mục không tồn tại',
            'title.required' => 'Vui lòng nhập tiêu đề',
            'content.required' => 'Vui lòng nhập nội dung',
            'tags.required' => 'Vui lòng chọn tag',
            'thumbnail.required' => 'Vui lòng chọn ảnh',
            'thumbnail.image' => 'Vui lòng chọn file ảnh',
            'thumbnail.mimes' => 'File ảnh phải có định dạng jpeg, png, jpg, gif, svg',
            'thumbnail.max' => 'File ảnh phải nhỏ hơn 2MB',
            'description.required' => 'Vui lòng nhập mô tả',
            'description.max' => 'Mô tả không được vượt quá 500 ký tự',
            'status.required' => 'Vui lòng chọn trạng thái',
            'status.in' => 'Trạng thái không hợp lệ',
            'slugs.required' => 'Vui lòng nhập slugs',
            'slugs.unique' => 'Slugs đã tồn tại',
            'slugs.regex' => 'Slugs không hợp lệ'
        ];
    }

    protected function withValidator($validator)
    {
        $validator->sometimes('thumbnail', 'required|image|mimes:jpeg,png,jpg|max:2048', function ($input) {
            return !$this->id;
        });
    }
}
