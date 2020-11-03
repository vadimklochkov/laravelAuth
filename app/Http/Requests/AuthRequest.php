<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'login' => 'required',
            'login2' => 'required',
            'mail' => 'required',
            'password' => 'required'
        ];
    }

    public function messages() 
    {
        return [
            'login.required' => 'Вы не указали имя',
            'login2.required' => 'Вы не указали фамилию',
            'mail.required' => 'Вы не указали mail',
            'password.required' => 'Вы не ввели пароль'
        ];
    }
}
