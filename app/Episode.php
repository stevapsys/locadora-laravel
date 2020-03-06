<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    //relacionando as tabelas 
    public function season(){
        return $this->belongsTo('App\Season');
    }
}
