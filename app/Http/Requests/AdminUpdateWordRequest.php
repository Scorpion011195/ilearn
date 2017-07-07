<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateWordRequest extends FormRequest
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
            '_nghia' => 'required|max:50',
            '_gtTo' => 'max:500',
        ];
    }

    public function messages()
    {
        return [
            '_nghia.required' => 'Bạn chưa nhập từ',
            '_nghia.max' => 'Từ phải ít hơn 50 kí tự',
            '_gtTo.required'  => 'Bạn chưa nhập nghĩa',
            '_gtTo.max' => 'Nghĩa phải ít hơn 500 kí tự'
        ];
    }
}
