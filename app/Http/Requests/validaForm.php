<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validaForm extends FormRequest
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
        $ano = date('Y');
        $mes = date('m');
        $dias = cal_days_in_month(CAL_GREGORIAN, $mes, date("Y")); // VER NÙMERO DE DIAS DO MÊS
        return [
        'descricao' => 'required',
        'valor' => 'required|regex:/^[0-9]{1,3}(.[0-9]{3})*(\,[0-9]+)*$/',
        'data' => 'required|date_format:d/m/Y|before_or_equal:'.$dias.'/'.$mes.'/'.$ano.'',
        'image' => 'nullable|image|max:8192',
        ];


    }

    public function messages()
{
    return [
        'descricao.required' => 'Insira uma descrição!',
        'valor.required' => 'Insira um valor!',
        'data.required' => 'Insira uma data!',
        'data.before_or_equal' => 'Só adicionamos despesas de datas deste mês ou de meses anteriores!',
        'data.date_format' => 'Data Inválida =/ Verifique se é o ano atual, ou se o dia do mês é válido',
        'image.max' => 'Imagem muito grande, envie imagens de até 8Mb!',
        'valor.regex' => 'Valor Inválido!',
    ];
}
}
