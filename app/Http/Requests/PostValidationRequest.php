<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Uppercase;

class PostValidationRequest extends FormRequest
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
            'picture' => ['required', 'mimes:png,jpg,jpeg', 'max:5048'], // 5048 is in KB size
            'title' => ['required', 'string', new Uppercase], // required field and should be a string
            'body' => 'required|string',
        ];
    }
}
