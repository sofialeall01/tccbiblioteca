<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    use HasFactory;

    protected $table = 'sistema';

    protected $fillable = [
        'livro_id', 'users_id'
    ];

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
