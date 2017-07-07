<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAddWordRequest extends FormRequest
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
            '_txttu' => 'required|max:50',
            '_txtnghia' => 'required|max:50',
            '_tatu' => 'max:500',
            '_tanghia' => 'max:500'
        ];
    }

    public function messages()
    {
        return [
            '_txttu.required' => 'Bạn chưa nhập từ',
            '_txttu.max' => 'Từ phải ít hơn 50 kí tự',
            '_txtnghia.required'  => 'Bạn chưa nhập nghĩa',
            '_txtnghia.max' => 'Nghĩa phải ít hơn 50 kí tự',
            '_tatu.max' => 'Giải thích phải ít hơn 500 kí tự',
            '_tanghia.max' => 'Giải thích phải ít hơn 500 kí tự'
        ];
    }
}
