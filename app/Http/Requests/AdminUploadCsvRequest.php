<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUploadCsvRequest extends FormRequest
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
            //
         'csv-file'=> 'required|mimes:csv,txt',
        ];
    }

    public function messages()
    {
        return [
            'csv-file.required' => 'Bạn chưa chọn file csv',
            'csv-file.mimes' => 'Vui lòng chọn đúng file csv',
        ];
    }
}
