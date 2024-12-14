<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Sistema;
use Auth;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
       // Obtém o usuário logado
    $userId = auth()->id();

    // Busca a entrada na tabela sistema com o users_id do usuário logado
    $sistema = Sistema::where('users_id', $userId)->first();

    $livro = null;

    // Verifica se a entrada foi encontrada e busca o livro
    if ($sistema && $sistema->livro_id) {
        $livro = Livro::find($sistema->livro_id);
    }

    // Retorna a view com os dados do livro
    return view('inicio', compact('livro'));
}

    // Retorna a view com os dados do livro
   
}
