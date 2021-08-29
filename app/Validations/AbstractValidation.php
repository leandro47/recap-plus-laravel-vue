<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

abstract class AbstractValidation
{
    /**
     * Faz validação dos campos
     *
     * @param array $input
     * @param array $rules
     * @param array $message
     * @return string $erros da validação
     */
    public static function validate(array $input, array $rules, array $message = []): string
    {
        $errors = "";
        $validator = Validator::make($input, $rules, $message);

        if ($validator->fails()) {
            $errors = implode(' / ', $validator->errors()->all());
        }

        return $errors;
    }
}
