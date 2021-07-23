<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Consola;
class JuegosControler extends Controller
{
    //

    public function getJuegosByConsola(Request $request){
        // va a obtener los juegos a partir de un id de consola
        $input = $request->all();

        $idConsola = $input["idConsola"];
        $consola = Consola::find($idConsola);
        return $consola->juegos()->get();
    }

    public function getJuegos(){
        //devolver todos los juegos del sistema}
        return Juego::all();
    }

    public function save(Request $request){
        //crear un nuevo juego
        $input = $request->all();
        $nombre = $input["nombre"];
        $fecha = $input["fecha_lanzamiento"];
        $apto = $input["apto_ninios"];
        $precio = $input["precio"];
        $descripcion = $input["descripcion"];
        $consolaId = $input["consolaId"];


        $juego=new Juego();
        $juego->nombre = $nombre;
        $juego->fecha_lanzamiento = $fecha;
        $juego->descripcion = $descripcion;
        $juego->apto_ninios = $apto;
        $juego->precio = $precio;
        $juego->consola_id = $consolaId;
        $juego->save();
        return $juego;
    }

    public function remove(Request $request){
        //eliminar un juego
        $input = $request->all();
        $id = $input["id"];
        $juego = Juego::findOrFail($id);
        $juego->delete();
        return "ok";



    }
}
