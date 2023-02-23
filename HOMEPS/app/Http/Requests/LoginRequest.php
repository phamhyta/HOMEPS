<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'Email' => 'required|email',
            'Password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Email.required' => 'Vui lòng nhập email',
            'Email.email' => 'Vui lòng nhập đúng email',
            'Password.required' => 'Vui lòng nhập password',
        ];
    }
}
