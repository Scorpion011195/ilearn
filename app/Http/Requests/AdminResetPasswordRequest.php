<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminResetPasswordRequest extends FormRequest
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
            'profile-password-old' => 'required|min:6|max:32',
            'profile-password-new' => 'required|min:6|max:32',
            'profile-password-new-confirm' =>'required|min:6|max:32'
        ];
    }

    public function messages()
    {
        return [
            'profile-password-old.required' => 'Bạn chưa nhập Mật khẩu cũ',
            'profile-password-old.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
            'profile-password-old.max' => 'Mật khẩu phải nhỏ hơn 32 kí tự',
            'profile-password-new.required' => 'Bạn chưa nhập Mật khẩu mới',
            'profile-password-new.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
            'profile-password-new.max' => 'Mật khẩu phải nhỏ hơn 32 kí tự',
            'profile-password-new-confirm.required' => 'Bạn chưa Xác nhận mật khẩu mới',
            'profile-password-new-confirm.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
            'profile-password-new-confirm.max' => 'Mật khẩu phải nhỏ hơn 32 kí tự',
        ];
    }
}
