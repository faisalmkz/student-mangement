<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required|max:500',
            'age' => 'required|numeric',
            'gender' => 'required',
            'reporting_to' => 'required',
            'standard_id' => 'required'
           
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'name',
            'age' => 'age',
            'gender' => 'gender',
            'reporting_to' => 'reporting teacher',
            'standard_id' => 'standard'
        ];
    }
}
