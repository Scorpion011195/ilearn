<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryUpdateRequest extends FormRequest
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
            'tu'=>'required|min: 1|max:100 |',
            'nghia'=>'required|min : 1|max:100'
        ];
    }
    public function messages()
    {
        return [
            'tu.required' => 'Bạn chưa nhập Từ',
            'tu.Regex' =>'Không được chứa số',
            'tu.max' => 'Từ phải nhỏ hơn 100 kí tự',
            'tu.min' => 'Từ phải lớn hơn 1 ',
            'nghia.required'  => 'Bạn chưa nhập nghĩa',
            'nghia.max' => 'Nghĩa phải nhỏ hơn 100 kí tự',
        ];
    }
}
