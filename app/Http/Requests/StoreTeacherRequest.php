<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
            'nip' => 'required|max:18|min:18|unique:teachers,nip',
            'password' => 'required|confirmed|min:6',
            'name' => 'required',
            'gender' => 'required|max:1|min:0',
            'born_date' => 'required',
            'born_place' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
        ];
    }
}
