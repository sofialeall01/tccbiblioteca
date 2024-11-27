<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;

    protected $table = 'historico';

    protected $fillable = ['data_inicio_leitura', 'data_fim_leitura', 'livro_id', 'usuario_id'];

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}

