<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sistema;
use Illuminate\Support\Facades\Auth;

class SistemaController extends Controller
{
    // Método para salvar ou atualizar a relação livro-usuário
    public function salvarLivro(Request $request)
    {
        $livro_id = $request->input('livro_id');
        $user_id = Auth::id();

        // Verificar se já existe uma relação para esse usuário
        $sistema = Sistema::where('users_id', $user_id)->first();

        if ($sistema) {
            // Se existir, apenas atualiza o livro_id
            $sistema->livro_id = $livro_id;
            $sistema->save();
        } else {
            // Se não existir, cria um novo registro
            Sistema::create([
                'livro_id' => $livro_id,
                'users_id' => $user_id,
            ]);
        }

        return response()->json(['message' => 'Livro atualizado com sucesso!']);
    }
}
