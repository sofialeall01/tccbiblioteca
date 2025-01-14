<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



use Illuminate\Support\Facades\Auth;

class AuthAPIController extends Controller
{
    public function login(Request $request)
    {
        // Valida os dados recebidos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        // Tenta realizar o login usando o Auth::attempt()
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dados de Login Inválidos'
            ], 401);
        }
    
        // Obtém o usuário logado
        $user = User::where('email', $request->email)->first();
    
        // Verifica se a senha fornecida é compatível com a senha armazenada no banco
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Senha incorreta'
            ], 401);
        }
    
        // Gera o token de autenticação
        $token = $user->createToken('auth_token')->plainTextToken;
    
        // Retorna os dados do usuário e o token
        return response()->json([
            'status' => 'success',
            'message' => 'Login realizado com sucesso!',
            'data' => [
                'usuario' => $user->email,
                'tokenAuth' => $token,
            ],
        ]);
    }

    function logout(Request $Request){
        //PEGA O USUÁRIO LOGADO, DELETA SEUS TOKENS E O DESLOGA.
        $user = Auth::user();
        $user->tokens()->delete();
        auth()->guard('web')->logout();
        return response()->json(['message' => 'Usuario efetuou logout'],200);
    }

    function atualizarToken(Request $Request){
        //PEGA O USUÁRIO LOGADO, DELETA SEUS TOKENS
        $user = Auth::user();
        $user->tokens()->delete();

        //CRIA UM NOVO TOKEN E O RETORNA COMO JSON
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    
    /**
     * Atualiza o e-mail e a senha do usuário logado.
     */
    public function atualizarEmailESenha(Request $request)
    {
        // Verificar se o usuário está autenticado
        $user = Auth::user();
    
        if (!$user) {
            return response()->json([
                'errors' => [
                    'auth' => ['Usuário não autenticado.'],
                ],
            ], 401); // Retorna erro de autenticação
        }
    
        // Validação dos dados - permite envio de email ou senha separadamente
        $rules = [
            'senhaAtual' => ['required_if:novaSenha,true', 'nullable'],
            'novaSenha' => ['nullable', 'min:8'],
            'newEmail' => ['nullable', 'email', 'unique:users,email,' . $user->id],
        ];
    
        // Se a nova senha for fornecida, inclui validação adicional para não precisar da confirmação
        if ($request->has('novaSenha')) {
            $rules['novaSenha'] = ['nullable', 'min:8'];
        }
    
        $request->validate($rules);
    
        // Se a senha foi fornecida, verifica se a senha atual está correta
        if ($request->has('senhaAtual') && !Hash::check($request->senhaAtual, $user->password)) {
            return response()->json([
                'errors' => [
                    'senhaAtual' => ['A senha atual está incorreta.'],
                ],
            ], 422); // Se a senha atual estiver incorreta
        }
    
        // Atualiza o e-mail, se fornecido
        if ($request->has('newEmail')) {
            $user->email = $request->newEmail;
        }
    
        // Atualiza a senha, se fornecida
        if ($request->has('novaSenha')) {
            $user->password = Hash::make($request->novaSenha);
        }
    
        // Salva as mudanças
        $user->save();
    
        return response()->json([
            'message' => 'E-mail e/ou senha atualizados com sucesso!',
            'data' => [
                'email' => $user->email, // Retorna o novo e-mail
                'senha_atualizada' => $request->has('novaSenha'), // Indica que a senha foi atualizada
            ]
        ]);
    }
    
    
public function perfil(Request $request)
{
    // Obter o usuário autenticado
    $usuario = Auth::user();

    // Verificar se o usuário está autenticado
    if (!$usuario) {
        return response()->json([
            'success' => false,
            'message' => 'Usuário não autenticado',
        ], 401);
    }

    // Preparar os dados do usuário
    $userData = [
        'id' => $usuario->id,
        'email' => $usuario->email,
        'created_at' => $usuario->created_at,
        'updated_at' => $usuario->updated_at,
        'password' => $usuario->password, 
    ];

    // Retornar os dados em formato JSON
    return response()->json([
        'success' => true,
        'data' => $userData,
    ]);
}
   


public function index()
{
    // Garantir que o usuário está autenticado
    if (auth()->check()) {
        // Busca os livros do usuário logado
        $livros = Livro::where('user_id', auth()->id())->get();

        // Adiciona as imagens em Base64
        $livrosComImagem = $livros->map(function ($livro) {
            if ($livro->fotoCapa && Storage::disk('public')->exists($livro->fotoCapa)) {
                $livro->fotoCapaBase64 = 'data:image/' . pathinfo($livro->fotoCapa, PATHINFO_EXTENSION) . ';base64,' . 
                                         base64_encode(Storage::disk('public')->get($livro->fotoCapa));
            } else {
                $livro->fotoCapaBase64 = null;
            }
            return $livro;
        });

        // Retorna os livros com imagem como resposta JSON
        return response()->json($livrosComImagem)->header('Content-Type', 'application/json');
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
public function exibir($id)
{
    // Busca o livro pelo ID
    $livro = Livro::find($id);

    // Verifica se o livro existe
    if (!$livro) {
        return response()->json(['error' => 'Livro não encontrado'], 404);
    }

    // Retorna os dados do livro em formato JSON
    return response()->json([
        'id' => $livro->id,
        'titulo' => $livro->titulo,
        'numero_paginas' => $livro->numero_paginas,
        'arquivo' => $livro->arquivo,  // Caminho do arquivo PDF
        'fotoCapa' => $livro->fotoCapa,  // Imagem de capa, se houver
        // Adicione outros campos que deseja exibir
    ]);
}


}


