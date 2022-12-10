<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'name' => ['required'],
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute Field nay bat buoc nhap'
        ];
    }
}
