<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
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
            'email' => 'required|max:191',
            'password' => 'required|max:191'
        ];
    }
    public function messages()
    {
        return [
            //
            'email.required' => 'Email không được để trống.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.max' => 'Mật khẩu của quá 191 kí tự'

        ];
    }
}
