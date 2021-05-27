<?php

namespace App\Http\Requests;

use App\Models\Grade;
use App\Models\Major;
use App\Rules\WrongPass;
use Illuminate\Support\Facades\Hash;
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
        $grade = Grade::find(request()->grade_id);
        $major = Major::find(request()->major_id);
        $wrongPass = '';
        if (!Hash::check(request()->currentpwd, $this->student->password)) {
            $wrongPass = new WrongPass;
        }
        $class = '';
        if (!$grade || !$major) {
            $class = 'required';
        }

        return [
            'currentpwd' => ['required', $wrongPass],
            'password' => 'confirmed',
            'gender' => 'required|max:1|min:0',
            'born_date' => 'required',
            'born_place' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'grade_id' => $class,
            'major_id' => $class,
            'graduated' => 'required',
        ];
    }
}
