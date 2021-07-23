<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaJuegos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            //1.definir los campos de la tabla juegos
            $table->string("nombre",100);
            $table->string("descripcion",200); //laravel eloquent,, tipos de datos,, database:Migration
            $table->tinyInteger("aptoninios")->default(0);
            $table->integer("precio")->unsigned();
            $table->date("fecha_lanzamiento");
            //2.Agregar la  columna  de la foranea
            //las claves foraneas en laravel por defecto son bigInteger y unsigned
            $table->bigInteger("consola_id")->unsigned();
            //3. agregar la relacion
            $table->foreign("consola_id")->references("id")->on("consolas")->onDelete("cascade");//onDelete(“restrict”)





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
        Schema::dropIfExists('juegos');
    }
}
