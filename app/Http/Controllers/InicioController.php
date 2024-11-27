<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        return view('inicio'); // Certifique-se que você tem uma view chamada 'inicio.blade.php'
    }
}
