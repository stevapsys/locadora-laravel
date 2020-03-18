<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\FilmeRequest; 
class ApiFilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Movie::paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $novoFilme = new Movie();
        $novoFilme->release_date = "$request->ano-$request->mes-$request->dia 00:00:00";
        $novoFilme->fill($data);
        $novoFilme->save();
        
        return $novoFilme;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
       $movie = Movie::find($id); 
        return $movie;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {

        //trazendo os dados do banco
        $movie= Movie::find($id); 
        
        //preenchendo a model com os valores da request;
        $movie->fill($request->all());

        //persistindo o novo model no banco;   
        $movie->save();

        return $movie;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //busquei no banco
        $movie = Movie::find($id);

        //removi o registro
        $movie->delete();

        //no destroy não tem return
    }
}
