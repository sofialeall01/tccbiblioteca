<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progresso extends Model
{
    use HasFactory;

    protected $table = 'progresso';

    protected $fillable = ['pagina_atual', 'data_ultima_atualizacao', 'livro_id', 'usuario_id'];

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

