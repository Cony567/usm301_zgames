<?php

namespace App\Http\Controllers;
use App\Models\Consola;
use Illuminate\Http\Request;


class ConsolasController extends Controller
{
    public function getMarcas(){
        $marcas = ["Sony","Microsoft","Nintendo","Sega"];
        return $marcas;
    }


    public function getConsolas(){
        $consolas = Consola::all();
        return $consolas;
    }

    public function crearConsola(){
        $consola = new Consola();
        $consola->nombre = "Nintendo Switch";
        $consola->marca = "Nintendo";
        $consola->anio = 2015;

        $consola->save();
        return $consola;
    }

}
