<?php

use App\Http\Controllers\AuthAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

Route::post('/login', [AuthAPIController::class, 'login'])->name('login.api');

Route::middleware('auth:sanctum')->group(function() {
    
    Route::put('/user/update-email-password', [AuthAPIController::class, 'atualizarEmailESenha']);
    Route::get('/perfil', [AuthAPIController::class, 'perfil']);
    Route::post('/logout', [AuthAPIController::class, 'logout']);
    Route::get('/livros', [AuthAPIController::class, 'index']);
    Route::get('/livro/{id}', [AuthAPIController::class, 'exibir']);


});



