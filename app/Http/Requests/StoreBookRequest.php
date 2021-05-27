<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Grade;
use App\Models\Kind;
use App\Models\Publisher;
use App\Models\Writer;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
        $categories = Category::all();
        $writers = Writer::all();
        $publishers = Publisher::all();
        $grades = Grade::all();

        if (request()->custom_category) {
            $validation_category_id = '';
        } else {
            $validation_category_id = 'required';
        }
        if (request()->custom_writer) {
            $validation_writer_id = '';
        } else {
            $validation_writer_id = 'required';
        }
        if (request()->custom_publisher_name or request()->custom_publisher_year or request()->custom_publisher_city) {
            $validation_publisher_id = '';
            $validation_custom_publisher = 'required';
        } else {
            $validation_publisher_id = 'required';
            $validation_custom_publisher = '';
        }

        return [
            'code' => 'required|unique:books,code',
            'kind_id' => 'required|in:1,2,3,4,5,6',
            'category_id' => $validation_category_id,
            'writer_id' => $validation_writer_id,
            'publisher_id' => $validation_publisher_id,
            'grade_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'isbn' => 'required',
            'custom_publisher_name' => $validation_custom_publisher,
            'custom_publisher_year' => $validation_custom_publisher,
            'custom_publisher_city' => $validation_custom_publisher,

        ];
    }
}
