<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sistema;
use Illuminate\Support\Facades\Auth;

class SistemaController extends Controller
{public function salvarLivro(Request $request)
    {
        // Recuperar o ID do livro e do usuário logado
        $livro_id = $request->input('livro_id');
        $user_id = Auth::id(); // Garantir que o ID do usuário logado é recuperado corretamente
    
        // Validação para garantir que o livro_id é fornecido
        if (!$livro_id) {
            return response()->json(['message' => 'ID do livro não fornecido'], 400);
        }
    
        // Tenta localizar o registro do sistema para esse usuário
        $sistema = Sistema::where('users_id', $user_id)->first();
    
        if ($sistema) {
            // Se já existir um registro, atualiza o livro_id
            $sistema->livro_id = $livro_id;
            $sistema->save(); // Salva as alterações
        } else {
            // Se não existir, cria um novo registro
            Sistema::create([
                'users_id' => $user_id,
                'livro_id' => $livro_id,
            ]);
        }
    
        return response()->json(['message' => 'Livro atualizado com sucesso!']);
    }
    
    
}
