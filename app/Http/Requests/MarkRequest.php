<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarkRequest extends FormRequest
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
            'student_id' => 'required',
            'term_id' => 'required',
            'maths' => 'required|numeric',
            'science' => 'required|numeric',
            'history' => 'required|numeric'
           
        ];
    }

    public function attributes()
    {
        return [
            'student_id' => 'student',
            'term_id' => 'term',
            'maths' => 'mark',
            'science' => 'mark',
            'history' => 'mark'
        ];
    }
}
