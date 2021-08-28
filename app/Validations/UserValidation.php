<?php

namespace App\Validations;

use App\Validations\AbstractValidation;

class UserValidation extends AbstractValidation
{
    public static function formValidate(array $data): string
    {
        return self::validate($data, ['email' => 'required|email', 'password' => 'required']);
    }
}
