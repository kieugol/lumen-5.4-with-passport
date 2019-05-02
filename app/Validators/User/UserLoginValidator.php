<?php

namespace App\Validators\User;

use  App\Validators\AbstractValidator;

class UserLoginValidator implements AbstractValidator
{
    public static function rules()
    {
        return [
            "email"    => "required|email",
            "password" => 'required|string|min:3'
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
