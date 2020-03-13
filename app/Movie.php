<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Actor;

use App\Genre; 

class Movie extends Model
{
    //para evitar falha de segurança usando o FILL
    protected $fillable = ['title','rating','awards','release_date','length'];
    public function actors(){
        //UM PRA MUITOS
        return $this->belongToMany(Actor::class); 
    }

    public function genre(){
        //MUITOS PRA UM
        return $this->belongsTo(Genre::class); 
    }
}
