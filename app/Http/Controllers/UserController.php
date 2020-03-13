<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//ADICIONAR A USE DA PASTA CRIADA PARA FAZER AS VALIDAÇÕES
use App\Http\Requests\UserRequest;

use App\User; 

class UserController extends Controller
{
    public function index() {
        $usuarios = User::paginate();
        return view('usuarios', ['usuarios' => $usuarios]);
    }

    public function create() {
        return view('adicionar_usuario');
    }
//TROCA O REQUEST POR USERREQUEST, QUE É A PASTA CRIADA PARA FAZER AS VALIDAÇÕES
    public function store(UserRequest $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->confirm_password = $request->confirm_password;


        return redirect('usuarios')->with('mensagem', 'Usuário adicionada com sucesso');
    }
}