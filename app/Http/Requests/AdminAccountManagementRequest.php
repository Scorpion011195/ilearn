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
        $currentDay = date('d-m-Y',strtotime("+1 day"));
        $formatDay = '01-01-1970';
        return [
            '_keytaikhoan' => 'nullable|alpha_dash|max:32',
            '_keyngaydk' => 'nullable|date_format:"d-m-Y"|before:'.$currentDay.'|after:'.$formatDay
        ];
    }

    public function messages()
    {
        return [
            '_keytaikhoan.alpha_dash' => 'Chỉ nhập các kí tự là: chữ, số, "-", "_"',
            '_keytaikhoan.max' => 'Từ phải ít hơn 32 kí tự',
            '_keyngaydk.date_format' => 'Không đúng định dạng d-m-Y',
            '_keyngaydk.before' => 'Ngày phải trước ngày hôm nay',
            '_keyngaydk.after' => 'Ngày phải sau ngày 01-01-1970'
        ];
    }
}
