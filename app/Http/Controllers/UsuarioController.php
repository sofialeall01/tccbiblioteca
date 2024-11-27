<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 use Illuminate\Support\Facades\Log;
 use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller
{
    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Agora estamos usando 'password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        // Criação do usuário
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);

        if (!$user) {
            return redirect()->back()->withErrors(['create_error' => 'Erro ao criar a conta.']);
        }

        return redirect()->route('inicio')->with('status', 'Conta criada com sucesso!');
    }
    public function updateEmail(Request $request)
    {
        $request->validate([
            'newEmail' => 'required|email|unique:users,email', // Garantir que o e-mail é único e válido
        ]);
    
        $user = auth()->user(); // Obtém o usuário logado
        $user->email = $request->newEmail; // Atualiza o e-mail
        $user->save(); // Salva no banco de dados
    
        return response()->json([
            'message' => 'Email atualizado com sucesso!',
        ]);
    }
    
     public function login(Request $request)
            {
                // Validação dos dados de entrada
                $request->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                // Verificação do usuário pelo email
                $user = User::where('email', $request->email)->first();

                // Verifica se a senha está correta
                if ($user && Hash::check($request->password, $user->password)) {
                    // Autentica o usuário e redireciona para a página inicial
                    auth()->login($user);
                    return redirect()->route('inicio');
                }

                // Retorna um erro de login caso as credenciais estejam incorretas
                return redirect()->back()->withErrors(['login_error' => 'Credenciais incorretas. Por favor, tente novamente.']);
            }
           

            
            
            public function atualizarSenha(Request $request)
            {
                $user = Auth::user();

                // Validação
                $request->validate([
                    'senhaAtual' => ['required'],
                    'novaSenha' => ['required', 'min:8', 'confirmed'],
                ]);

                // Verifica se a senha atual está correta
                if (!Hash::check($request->senhaAtual, $user->password)) {
                    return response()->json([
                        'errors' => [
                            'senhaAtual' => ['A senha atual está incorreta.'],
                        ],
                    ], 422);
                }

                // Atualiza a senha do usuário
                $user->update([
                    'password' => Hash::make($request->novaSenha),
                ]);

                // Retorna uma resposta JSON para o script
                return response()->json([
                    'message' => 'Senha atualizada com sucesso!',
                    'redirect' => route('perfil'), // Define a rota de redirecionamento
                ]);
            }
            
            public function logout()
            {
                Auth::logout(); // Realiza o logout do usuário
                return response()->json(['message' => 'Logout realizado com sucesso!']);
            }
            
    }