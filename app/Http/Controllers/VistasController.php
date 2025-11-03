<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistasController extends Controller
{
    function inicio(){
        return view("vistas.principal");
    }
    public function atrac() {
    return view('vistas.atracciones');
}

}
