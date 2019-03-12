<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobEditFormRequest extends FormRequest
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
            'name' => 'required|min:3|string',
            'description' => 'required|min:4|string',
            'salary' => 'required|min:3|string',
            'rating' => 'required|integer',
            'slug' => 'string|min:3',
            'logo' => 'mimes:jpg,gif,png,webp,jpeg|file|image|max:10024'
        ];
    }
}
