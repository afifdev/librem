<?php

namespace App\Http\Requests;

use App\Rules\WrongPass;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateTeacherRequest extends FormRequest
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
        $wrongPass = '';
        if (!Hash::check(request()->currentpwd, $this->teacher->password)) {
            $wrongPass = new WrongPass;
        }
        return [
            'currentpwd' => ['required', $wrongPass],
            'password' => 'confirmed',
            'name' => 'required',
            'gender' => 'required|max:1|min:0',
            'born_date' => 'required',
            'born_place' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ];
    }
}
