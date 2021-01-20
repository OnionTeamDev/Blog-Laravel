<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends FormRequest
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
            'email' => 'unique:users,email,'.$this->segment(5).',id|required',
            'phone' => 'unique:users,phone,'.$this->segment(5).',id|required',
            'password' => 'required',
            'name' => 'required|max:191',
            'address' => 'required|max:191'
        ];
    }
    public function messages()
    {
        return [
            'email.unique' => 'Email đã được sử dụng',
            'phone.unique' => 'Số điện thoại đã được sử dụng',
            'name.required' => 'Tên không được để trống',
            'name.max' => 'tên dài quá kí tự cho phép',
            'address.max' => 'địa chỉ vượt quá kí tự cho phép ',
        ];
    }
}
