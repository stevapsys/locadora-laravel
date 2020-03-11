<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            // aplicando as regras que estão na doc do Laravel
            'name' => 'required',
            //unique = pra ver se a pessoa já não está cadastrada no banco de dados. nome da tabela (no caro usuarios) e item que quer validar (email)
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|min:6|confirmed',
        ];
    }

    //para traduzir a mensagem de erro - outra alternativa é mexer no lang em resourcer
    public function messages() {
        return [
            'name.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo e-mail é obrigatório!',
            'email.email' => 'Este campo deve ser um e-mail!',
            'password.required' => 'O campo senha é obrigatório!',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres',
            'password.confirmed' => 'Confirme sua senha', 
        ];
    }
}
