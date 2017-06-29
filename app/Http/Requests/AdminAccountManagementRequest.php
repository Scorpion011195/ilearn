<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAccountManagementRequest extends FormRequest
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
        $currentDay = date('Y-m-d',strtotime("+1 day"));
        return [
            '_keytaikhoan' => 'max:32',
            //'_keyngaydk' => 'before:'.$currentDay,
        ];
    }

    public function messages()
    {
        return [
            '_keytaikhoan.max' => 'Từ phải ít hơn 32 kí tự',
            //'_keyngaydk.before' => 'Ngày đăng ký phải trước ngày hiện tại'
        ];
    }
}
