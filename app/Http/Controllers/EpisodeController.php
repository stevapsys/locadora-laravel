<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//chamando o model 
use App\Episode; 

class EpisodeController extends Controller
{
    public function index() {
        //funções estáticas - metódos que não precisam ser estanciadas para começar. Para chama-la, é o nomedela:: 
       // As models (tabelas) são funções estáticas. O método all é para trazer tudo na tabela - jogar em uma variável para trabalhar com ela  
        /*$episodes = Episode::all(); */
        
        //o find encontra o que naquela posição do indíce 
        /*$episode = Episode::find(1); */
        //dd é a junção do print_r com die | o toArray converte o objeto em array 
        /*dd($episode ->toArray()); */

        //query - o firt sempre retorna o primeiro elemento uma model e o get traz um array 
        /*$episodios_com_query = Episode::query()->whereIn('id',[1,2]) */
        //->get();
        /* ->first();
        dd($episodios_com_query); */

        //adicionando um registro no banco 
        /* $episode = new Episode();
        $episode->title= "Mr. Robot";
        $episode->number= "456";
        $episode->rating = "10";
        $episode->release_date= "2020-03-06 00:00:00";
        $episode->save();

        $episode = Episode::find(58);
        dd($episode); */

        //editando um registo no banco 
        $episode = Episode::find(1);
        $episode->title= "Game of Thrones";
        //para ver uma informação da tabela que está relacionada
        dd($episode->season->title);
        $episode->save(); 
        dd($episode); 

        //deletando um registro no banco
       /* $episode = Episode::find(58);
        $episode->delete(); */
    } 
}
