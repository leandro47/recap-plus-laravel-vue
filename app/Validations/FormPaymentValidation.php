<?php

namespace App\Validations;

use App\Validations\AbstractValidation;
use App\Interfaces\ValidateInterface;

class FormPaymentValidation extends AbstractValidation implements ValidateInterface
{
    public static function formValidate(array $input, bool $isUpdate = false): string
    {
        $rules = [
            'description' => 'required|unique:form_payments',
        ];

        $messages = [
            'description.required' => 'Descrição não preenchida',
            'description.unique' => 'Já existe uma descrição igual essa!',
        ];

        return self::validate($input, $rules, $messages);
    }
}
