<?php

namespace App\Helpers;

/**
 * Class CommonHelper.
 */
trait CommonHelper
{
    /**
     * Transform error message from array to string.
     *
     * @param array $errors
     *
     * @return null|string
     */
    public static function formatErrorsMessage($errors = [])
    {
        $errMgs = [];

        foreach ($errors as $key => $error) {
            $errMgs = array_merge($errMgs, $error);
        }

        $errMgs = array_values(array_unique($errMgs));

        if (!$errMgs) {
            return;
        }

        return implode('<br>', $errMgs);
    }
}
