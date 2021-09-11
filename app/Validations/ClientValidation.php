<?php

namespace App\Validations;

use App\Validations\AbstractValidation;
use App\Interfaces\ValidateInterface;

class ClientValidation extends AbstractValidation implements ValidateInterface
{
    public static function formValidate(array $input, bool $isUpdate = false): string
    {
        $rules = [
            'email' => 'required|email',
            'type' => 'required',
            'name' => 'required',
            'cpf_cnpj' => 'required|unique:clients',
            'city' => 'required',
            'cep' => 'required',
            'district' => 'required',
            'street' => 'required',
            'number' => 'required',
        ];

        if ($isUpdate) {
            $rules['cpf_cnpj'] = 'required';
        }

        $messages = [
            'email.required' => 'Email não preenchido',
            'email.email' => 'Email não é valido',
            'type.required' => 'Pessoa fisíca ou juridica',
            'name.required' => 'Nome não preenchido',
            'cpf_cnpj.required' => 'Número do documento não preenchido',
            'cpf_cnpj.unique' => 'Já existe um documento com esse número',
            'city.required' => 'Selecione uma cidade',
            'cep.required' => 'CEP não preenchido',
            'district.required' => 'Bairro não preenchido',
            'street.required' => 'Nome da rua não preenchida',
            'number.required' => 'Numero do local não preenchido',
        ];

        return self::validate($input, $rules, $messages);
    }
}
