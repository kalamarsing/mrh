<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;


class CreateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|unique:users|email',
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|confirmed',
        ];
    }


    public function authorize()
    {
        return true;
    }

    
}