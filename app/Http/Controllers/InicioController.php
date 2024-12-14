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
       // Busca a primeira entrada na tabela sistema
    $sistema = Sistema::first();

    // Verifica se existe um sistema e se o livro_id está definido
    if ($sistema && $sistema->livro_id) {
        // Busca o livro correspondente ao livro_id na tabela sistema
        $livro = Livro::find($sistema->livro_id);
    } else {
        // Se não encontrar o livro, define uma variável livro como null
        $livro = null;
    }
    // Verifica se o livro pertence ao usuário logado
    if ($livro && $livro->user_id === Auth::id()) {
        // Retorna a view com os dados do livro
        return view('inicio', compact('livro'));
    }

    // Retorna a view com os dados do livro
    return view('inicio', compact('livro'));
}
}