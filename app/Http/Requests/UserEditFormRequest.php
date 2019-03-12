<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditFormRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:225',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:11',
            'role' => 'string|min:3',
            //'password' => 'string|min:6|confirmed',
            'sex' => 'required|string|max:6|min:4',
            'address' => 'required|string|min:4',
            'file' => 'mimes:jpg,gif,png,webp,jpeg|file|image|max:10024',
        ];
    }
}
