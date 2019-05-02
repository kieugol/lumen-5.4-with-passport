<?php

namespace App\Validators;

/**
 * Interface AbstractValidator
 * @package App\Http\Validators
 */
interface AbstractValidator
{

    /**
     * @return array
     */
     public static function rules();

    /**
     * @return array
     */
    public static function messages();
}
