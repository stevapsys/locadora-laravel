<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Season; 

class Episode extends Model
{
    //relacionando as tabelas 
    public function seasons(){
        return $this->belongsTo(Season::class);
        // é a mesma coisa que: 
        // return $this->belongsTo('App\Season');
    }

    public function actors (){
        return $this->belongsToMany(Actor::class); 
    }
}
