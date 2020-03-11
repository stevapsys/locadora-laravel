<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
//ADICIONAR A USE DA PASTA CRIADA PARA FAZER AS VALIDAÇÕES
use App\Http\Requests\FilmeRequest;


class FilmeController extends Controller
{
    public function procurarFilmeId ($id){
       //criando um array 
        /* $filmes = [
            1 => "Toy Story",
            2 => "Procurando Nemo",
            3 => "Avatar",
            4 => "Star Wars: Episódio V",
            5 => "Up",
            6 => "Mary e Max"
            ];
        //code here
        return "O filme escolhido foi: $filmes[$id]"; */

        //puxando o array do banco de dados 
        $filmes = Movie::find($id);
        $filme = $filmes -> title; 
        return "retornar o $filme"; 
    }

    public function procurarFilmeNome ($nome) {
       /* $filmes = [
            1 => "Toy Story",
            2 => "Procurando Nemo",
            3 => "Avatar",
            4 => "Star Wars: Episódio V",
            5 => "Up",
            6 => "Mary e Max"
            ]; 
            foreach ($filmes as $filme) {
                if (strtolower($filme) == strtolower($nome)) {
                    return $filme; 
    
                }
            }*/

        $filme = Movie::query()->where ('title', $nome)->first();
        $titulo = $filme->title;
        return $titulo; 
     
    } 

    public function listar () {
         //trazendo a lista de filmes do banco de dados 
         //paginate -> é pra paginar, assim separa a lista por páginas. Pra isso, no view tem que colocar {{ $filmes->links() }}
        $filmes = Movie::query()->paginate();
        return view('filmes', ['filmes' => $filmes]);
    }
    
    public function adicionarFilme() {
        return view('adicionar-filme');
    }

        // o request é para enviar uma requisição do controller para o servidor. você pode usar ou não, as vezes já é obvio que é uma requisão, então ele já entende
    public function adicionarFilmePost(FilmeRequest $request) {
       // dd($request->classificacao);
        $filmeNovo = new Movie();
        $filmeNovo->title = $request->titulo;
        $filmeNovo->rating = $request->classificacao; 
        $filmeNovo->awards= $request->premios;  
        $filmeNovo->length= $request->duracao;  
        $filmeNovo->release_date= "$request->ano-$request->mes-$request->dia 00:00:00";
        $filmeNovo->save(); 

        return redirect('/filmes')->with('mensagem', 'Formulario salvo!');
    }

}

