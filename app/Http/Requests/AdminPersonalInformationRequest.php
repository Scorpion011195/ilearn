<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPersonalInformationRequest extends FormRequest
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
        $currentDay = date('d-m-Y',strtotime("+1 day"));
        $formatDay = '01-01-1970';
        return [
            'profile-name' => 'max:100',
            'profile-address' => 'max:200',
            'profile-phone' => 'digits_between:9, 11',
            'profile-dob' => 'nullable|date_format:"d-m-Y"|before:'.$currentDay.'|after:'.$formatDay
        ];
    }

    public function messages()
    {
        return [
            'profile-name.max' => 'Tên phải không quá 100 kí tự',
            'profile-address.max' => 'Địa chỉ phải không quá 200 kí tự',
            'profile-phone.digits_between'  => 'Số điện thoại không hợp lệ',
            'profile-dob.date_format' => 'Không đúng định dạng d-m-Y',
            'profile-dob.before' => 'Ngày sinh phải trước ngày hôm nay',
            'profile-dob.after' => 'Ngày sinh phải sau ngày 01-01-1970'
        ];
    }
}
