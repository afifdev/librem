<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        $rules =  [
            'kind_id' => 'required',
            'category_id' => 'required',
            'writer_id' => 'required',
            'publisher_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required',

        ];
        return $rules;
    }
}
