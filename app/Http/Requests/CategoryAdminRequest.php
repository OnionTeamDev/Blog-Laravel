<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAdminRequest extends FormRequest
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
            //
            'category_name' => 'required|unique:category,category_name,'.$this->segment(4).',id|bail',
            'category_status' => 'required',
            'category_desc' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'category_name.unique' => 'Tên danh mục không được trùng',
            'category_name.required' => 'Tên danh mục không được để trống',
            'category_name.bail' => 'Tên danh mục chỉ có chứa chữ cái',
            'category_status.required' => 'Nổi bật không đươc để trống',
            'category_desc.required' => 'Mô tả không được để trống',
        ];

    }
}
