<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaRegistro extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|unique:App\Models\usuario,email|email',
            'nome' => 'required|min:3',
            'telefone' => 'required|unique:App\Models\usuario,telefone',
            'senha' => 'required|min:6',
            ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Insira um email!',
            'email.unique' => 'Este E-Mail já foi cadastrado!',
            'email.email' => 'Insira um E-Mail Válido!',
            'nome.required' => 'Insira um nome!',
            'nome.min' => 'Insira um nome válido!',
            'telefone.required' => 'Insira um telefone!',
            'telefone.unique' => 'Este Telefone já foi cadastrado!',
            'senha.required' => 'Insira uma senha!',
            'senha.min' => 'Insira uma senha segura de no mínimo 6 caracteres!',
        ];
    }
}
