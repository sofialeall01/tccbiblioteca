<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankingMensal extends Model
{
    use HasFactory;

    protected $table = 'ranking_mensal';

    protected $fillable = ['posicao', 'mes', 'ano'];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_has_ranking_mensal');
    }
}

