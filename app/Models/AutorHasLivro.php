<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorHasLivro extends Model
{
    use HasFactory;

    protected $table = 'autor_has_livro';

    protected $fillable = ['autor_id', 'livro_id'];
}
