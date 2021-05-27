<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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

    // Custom Message
    public function messages()
    {
        return [
            'grade_id.required' => 'The class field is required. ',
            'major_id.required' => 'The major field is required. ',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nis' => 'required|unique:students,nis',
            'password' => 'required|confirmed|min:6',
            'name' => 'required',
            'gender' => 'required|max:1|min:0',
            'born_date' => 'required|before:today',
            'born_place' => 'required',
            'phone_number' => 'required|numeric',
            'grade_id' => 'required',
            'major_id' => 'required',
            'address' => 'required',
        ];
    }
}
