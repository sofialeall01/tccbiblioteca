<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\SistemaController;

//rpotas para abrir as pagins
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
Route::get('/biblioteca', [BibliotecaController::class, 'index'])->name('biblioteca');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/inicio', [InicioController::class, 'index'])->name('inicio');
Route::get('/login', [LoginController::class, 'index'])->name('login');

//rotas para  usuario
Route::post('/login', [UsuarioController::class, 'login'])->name('usuario.login');
Route::post('/usuario', [UsuarioController::class, 'store'])->name('usuario.store');
Route::post('/editar-email', [UsuarioController::class, 'updateEmail'])->name('editar.email');
Route::post('/usuario/atualizar-senha', [UsuarioController::class, 'atualizarSenha'])->name('usuario.atualizar-senha');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

//rota para livro
Route::post('/adicionar-livro', [LivroController::class, 'store'])->name('livro.store');
Route::get('/exibir-livro', [LivroController::class, 'index'])->name('livros.index');
Route::put('/livros/{id}', [LivroController::class, 'update'])->name('livros.update');
Route::delete('/livros/{id}', [LivroController::class, 'destroy'])->name('livros.destroy');
Route::get('/buscar', [LivroController::class, 'buscar'])->name('livros.buscar');
Route::post('/historico/salvar', [LivroController::class, 'salvarDataLeitura']);
Route::get('/livro/{id}', [LivroController::class, 'show']);
Route::get('/livros/{id}/pdf', [LivroController::class, 'getPdf'])->name('livros.getPdf');
Route::get('/livro/exibir/{id}', [LivroController::class, 'exibir'])->name('livro.exibir');


//rotas para sistema
Route::post('/salvar-livro', [SistemaController::class, 'salvarLivro'])->name('salvar.livro');
Route::get('/leitura', [SistemaController::class, 'showLeitura'])->name('leitura');

Route::get('/', function () {
    return view('home');
});




