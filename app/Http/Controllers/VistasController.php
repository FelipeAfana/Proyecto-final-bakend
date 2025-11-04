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
    function montaña() {
        return view('vistas.atracciones.montaña');
    }
    function promo() {
        return view('vistas.promo');
    }

}
