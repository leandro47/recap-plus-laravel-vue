<?php

namespace App\Validations;

use App\Validations\AbstractValidation;
use App\Interfaces\ValidateInterface;

class UserValidation extends AbstractValidation implements ValidateInterface
{
    public static function formValidate(array $input): string
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'Email não preenchido',
            'email.email' => 'Email não é valido',
            'password.required' => 'Senha não preenchida'
        ];

        return self::validate($input, $rules, $messages);
    }
}
