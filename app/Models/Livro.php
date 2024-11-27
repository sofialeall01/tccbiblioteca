<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livro';

    protected $fillable = ['titulo', 'numero_paginas', 'arquivo', 'user_id','fotoCapa'];

    

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autor_has_livro', 'livro_id', 'autor_id');
    }
    

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function progresso()
    {
        return $this->hasMany(Progresso::class);
    }

    public function historico()
    {
        return $this->hasMany(Historico::class);
    }

    public function favoritos()
    {
        return $this->hasMany(Favorito::class);
    }

    public function rankingsMensais()
    {
        return $this->belongsToMany(RankingMensal::class, 'livro_has_ranking_mensal');
    }
}

