<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'currentpwd' => 'required',
            'password' => 'confirmed',
            'name' => 'required',
            'gender' => 'required|max:1|min:0',
            'born_date' => 'required',
            'born_place' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'grade_id' => 'required',
            'major_id' => 'required',
            'graduated' => 'required',
        ];
    }
}
