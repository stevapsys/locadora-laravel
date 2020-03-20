<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //essa linha é pra criar uma tabela
        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            //completar com os dados da tabela do DER
            $table->string('first_name',100);
            $table->string('last_name', 100);
            $table->decimal('rating', 3, 1)->nullable(); //nullable é pra campos que podem ser nulos. São nulos quando o losango no item no DER estiver
            $table->bigInteger('favorite_movie_id')->unsigned()->nullable(); //se que for criar uma chave estrangeira: transformar Int em bigInteger e é obrigatorio unsigned, porque ele diz que não existem números negativos
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actors');
    }
}
