<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.first_name' => 'Vui lòng nhập First Name',
            'email.last_name' => 'Vui lòng nhập Last Name',
            'email.birthday' => 'Vui lòng nhập Ngày Sinh',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng email',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Vui lòng nhập password lớn hơn 6 kí tự',
            'password_confirmation.required' => 'Vui lòng nhập lại password',
        ];
    }
}
