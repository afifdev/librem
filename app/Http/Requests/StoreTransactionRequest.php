<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'book_code' => 'required',
            // 'student_nis' => 'required|numeric',
            // 'teacher_nip' => 'required',
            'user_number' => 'required|numeric',
            'user' => 'required|in:student,teacher',
            'type' => 'required|in:paket,reguler',
            'due_date' => 'required|date|after:today',
            'detail' => 'required',
        ];
    }
}
