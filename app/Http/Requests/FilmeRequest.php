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
            'title' => 'required',
            'rating' => 'required|numeric',
            'awards' => 'required|integer',
            'length' => 'required|integer',
            'dia' => 'required',
            'mes' => 'required',
            'ano' => 'required',
        ];
    }

    //para traduzir a mensagem de erro - outra alternativa é mexer no lang em resourcer
    public function messages() {
        return [
            'title.required' => 'O campo título é obrigatório!',
            'rating.required' => 'O campo de classificação é obrigatório!',
            'rating.numeric' => 'Esse campo deve ser um número',
            'awards.required' => 'O campo de classificação é obrigatório!',
            'awards.integer' => 'Esse campo deve ser um número inteiro!',
            'length.required' => 'O campo de duração é obrigatório!',
            'length.integer' => 'Esse campo deve ser um número inteiro!',
            'dia.required' => 'Complete o dia',
            'mes.required' => 'Complete o mês',
            'ano.required' => 'Complete o ano',
        ];
    }
}
