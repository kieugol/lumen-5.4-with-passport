<?php

namespace App\Validators;

/**
 * Interface AbstractValidator.
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
