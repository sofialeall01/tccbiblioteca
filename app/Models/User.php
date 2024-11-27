<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * O nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'users'; // Aponta para a tabela 'users'

    // Campos que podem ser preenchidos via atribuição em massa
    protected $fillable = ['email', 'password']; // Certifique-se que os nomes correspondem às colunas no banco

    // Se a tabela não tem timestamps, você pode desabilitar isso
    // public $timestamps = false; // Se não precisar de timestamps, descomente esta linha

    // Outros métodos e relações adicionais, se necessário
}
