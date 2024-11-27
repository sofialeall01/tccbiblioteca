<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroHasRankingMensal extends Model
{
    use HasFactory;

    protected $table = 'livro_has_ranking_mensal';

    protected $fillable = ['livro_id', 'ranking_mensal_id'];
}



