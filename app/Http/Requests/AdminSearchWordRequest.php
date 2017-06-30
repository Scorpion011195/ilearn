<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSearchWordRequest extends FormRequest
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
            '_keytratu' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            '_keytratu.required' => 'Bạn chưa nhập từ',
            '_keytratu.max' => 'Từ phải ít hơn 50 kí tự'
        ];
    }
}
