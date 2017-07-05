<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'username' => 'required|max:32',
            'password' => 'required|max:32'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Bạn chưa nhập Username',
            'username.max' => 'Username phải nhỏ hơn 32 kí tự',
            'password.required'  => 'Bạn chưa nhập Password',
            'password.max' => 'Mật khẩu phải nhỏ hơn 32 kí tự',
        ];
    }
}
