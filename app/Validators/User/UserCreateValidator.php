<?php

namespace App\Validators\User;

use  App\Validators\AbstractValidator;

class UserCreateValidator implements AbstractValidator
{
    public static function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:3|max:20',
            'age'        => 'string',
        ];
    }

    /**
     * @return array
     */
    public static function messages()
    {
        return [];
    }
}
