<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminDetailUserRequest extends FormRequest
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
    {   $currentDay = date('Y-m-d',strtotime("+1 day"));
        return [
            'profile-name' => 'max:100',
            'profile-address' => 'max:200',
            'profile-phone' => 'digits_between:6, 11',
            //'profile-dob' => 'before:'.$currentDay
        ];
    }

    public function messages()
    {
        return [
            'profile-name.max' => 'Tên phải không quá 100 kí tự',
            'profile-address.max' => 'Địa chỉ phải không quá 200 kí tự',
            'profile-phone.digits_between'  => 'Số điện thoại không hợp lệ',
            //'profile-dob.before' => 'Ngày sinh phải trước ngày hiện tại',
        ];
    }
}
