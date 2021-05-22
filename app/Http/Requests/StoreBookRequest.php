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
        $kinds = Kind::all();
        $categories = Category::all();
        $writers = Writer::all();
        $publishers = Publisher::all();
        $grades = Grade::all();

        if (request()->publisher_id === 'tambah') {
            $validation_publisher = 'required';
        } else {
            $validation_publisher = '';
        }
        if (request()->category_id !== 'kosong') {
            $validation_category_id = 'required';
        } else {
            $validation_category_id = '';
        }
        if (request()->writer_id !== 'kosong') {
            $validation_writer_id = 'required';
        } else {
            $validation_writer_id = '';
        }

        return [
            'code' => 'required|unique:books,code',
            'kind_id' => 'required',
            'category_id' => $validation_category_id,
            'writer_id' => $validation_writer_id,
            'publisher_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'avalaibility' => 'required|numeric|min:0|max:1',
            'isbn' => 'required',
            // CUSTOM FIELD
            'custom_publisher_name' => $validation_publisher,
            'custom_publisher_year' => $validation_publisher,
            'custom_publisher_city' => $validation_publisher,

        ];
    }
}
