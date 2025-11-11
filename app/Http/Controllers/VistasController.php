<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistasController extends Controller
{
    function inicio(){
        return view("vistas.inicio");
    }
    function atrac() {
    return view('vistas.atracciones');
    }   
    
    function promo() {
        return view('vistas.promo');
    }
    function montaña() {
        return view('vistas.atracciones.montaña');
    }
    function barco() {
        return view('vistas.atracciones.barco');
    }
    function rueda() {
        return view('vistas.atracciones.rueda');
    }
    function carro() {
        return view('vistas.atracciones.carros');
    }

}
