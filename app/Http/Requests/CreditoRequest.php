<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class CreditoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $data = [
            'valor_emprestimo' => ['required', 'numeric'],
            'instituicoes' => ['nullable', 'array'],
            'convenios' => ['nullable', 'array'],
            'parcela' => ['nullable', 'numeric','in:36,48,60,72,84'],
        ];

        return $data;
    }

    public function messages()
    {
        return [
            'valor_emprestimo.required' => 'O campo valor do empréstimo é obrigatório.',
            'valor_emprestimo.numeric' => 'O campo valor do empréstimo deve ser um número.',
            'instituicoes.array' => 'O campo instituições deve ser um array.',
            'convenios.array' => 'O campo convênios deve ser um array.',
            'parcela.numeric' => 'O campo parcela deve ser um número.',
            'parcela.in' => 'O valor da parcela deve ser 36, 48, 60, 72 ou 84 parcelas.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422));
    }
}
