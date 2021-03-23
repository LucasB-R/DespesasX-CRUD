<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaLogin extends FormRequest
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
            'email' => 'required|email',
            'senha' => 'required',
            'remember' => 'nullable',
            ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Insira um email!',
            'email.email' => 'Insira um email válido!',
            'senha.required' => 'Insira uma senha!'
        ];
    }
}
