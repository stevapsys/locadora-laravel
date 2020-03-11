<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmeRequest extends FormRequest
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
            'titulo' => 'required',
            'classificacao' => 'required|numeric',
            'premios' => 'required|integer',
            'duracao' => 'required|integer',
            'dia' => 'required',
            'mes' => 'required',
            'ano' => 'required',
        ];
    }

    //para traduzir a mensagem de erro - outra alternativa é mexer no lang em resourcer
    public function messages() {
        return [
            'titulo.required' => 'O campo título é obrigatório!',
            'classificacao.required' => 'O campo de classificação é obrigatório!',
            'classificacao.numeric' => 'Esse campo deve ser um número',
            'premios.required' => 'O campo de classificação é obrigatório!',
            'premios.integer' => 'Esse campo deve ser um número inteiro!',
            'duracao.required' => 'O campo de duração é obrigatório!',
            'duracao.integer' => 'Esse campo deve ser um número inteiro!',
            'dia.required' => 'Complete o dia',
            'mes.required' => 'Complete o mês',
            'ano.required' => 'Complete o ano',
        ];
    }
}
