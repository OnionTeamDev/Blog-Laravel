<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostAdminRequest extends FormRequest
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
            'post_name' => 'required|unique:post,post_name,'.$this->segment(4).',id',
            'post_status' => 'required',
            'category_id' => 'required|numeric',
            'post_desc' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'post_name.unique' => 'Tên bài viết không được trùng',
            'post_name.required' => 'tên bài viết không được trống',
            'category_id.required' => 'danh mục không được trống',
            'category_id.numberic' => 'danh mục phải bắt đầu là một số',
            'post_desc.required' => 'Mô tả không được trống',
        ];
    }
}
