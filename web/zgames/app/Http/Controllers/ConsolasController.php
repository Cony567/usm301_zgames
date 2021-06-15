<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsolasController extends Controller
{
    public function getMarcas(){
        $marcas = ["Sony","Microsoft","Nintendo","Sega"];
        return $marcas;
    }
}
