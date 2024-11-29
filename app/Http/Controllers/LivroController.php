<?php

namespace App\Http\Controllers;
use App\Models\Historico;
use App\Models\Livro;
use App\Models\Autor;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Storage;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // Passa a variável livros para a view
          if (!auth()->check()) {
            return redirect()->route('login');  // Se o usuário não estiver logado, redireciona para login
        }
    
        $userId = auth()->user()->id;
        
        // Buscando os livros do usuário logado
        $livros = Livro::where('user_id', $userId)->get();
        
        // Para cada livro, busque o histórico correspondente (livro_id == id do livro)
        $historicos = [];
        foreach ($livros as $livro) {
            $historicos[$livro->id] = Historico::where('livro_id', $livro->id)->first(); // Buscando o histórico específico para cada livro
        }
    
        return view('biblioteca', compact('livros', 'historicos'));
    }
    
    

    // Método para exibir a página de biblioteca (com ou sem pesquisa)
      public function buscar(Request $request)
        {
           // Recuperando a consulta de pesquisa
                $query = $request->input('query');

                // Se não houver consulta, retornamos uma resposta vazia ou um aviso
                if (empty($query)) {
                    return view('biblioteca')->with('livros', collect()); // Retorna uma coleção vazia
                }

                // Buscar livros pelo título ou autor (garantindo que não haja duplicatas)
                $livros = Livro::where('titulo', 'LIKE', '%' . $query . '%')
                                ->orWhereHas('autores', function($query) use ($request) {
                                    $query->where('nome', 'LIKE', '%' . $request->input('query') . '%');
                                })
                                ->distinct()  // Garantir que os livros não sejam duplicados
                                ->get();

                // Retorna a view com os livros encontrados
                return view('biblioteca', compact('livros'));
        }
        
        

public function salvarDataLeitura(Request $request)
{
    Log::info('Recebido no controlador:', $request->all());

    try {
        // Valida os dados, mas permite que cada campo seja opcional
        $validated = $request->validate([
            'livro_id' => 'required|exists:livro,id', // Valida o ID do livro
            'data_inicio_leitura' => 'nullable|date', // Permite data de início opcional
            'data_fim_leitura' => 'nullable|date',    // Permite data de fim opcional
        ]);

        // Busca ou cria o histórico do livro para o usuário logado
        $historico = \App\Models\Historico::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'livro_id' => $validated['livro_id'],
            ]
        );

        // Atualiza os campos individualmente, sem dependência
        if (!empty($validated['data_inicio_leitura'])) {
            $historico->data_inicio_leitura = $validated['data_inicio_leitura'];
        }

        if (!empty($validated['data_fim_leitura'])) {
            $historico->data_fim_leitura = $validated['data_fim_leitura'];
        }

        // Salva as alterações no banco de dados
        $historico->save();

        Log::info('Histórico salvo:', $historico->toArray());

        return response()->json(['message' => 'Data salva com sucesso!']);
    } catch (\Exception $e) {
        Log::error('Erro ao salvar:', ['error' => $e->getMessage()]);

        return response()->json(['message' => 'Erro ao salvar a data.', 'error' => $e->getMessage()], 500);
    }
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // Controller
    // Controller
   

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'numero_paginas' => 'required|integer',
            'arquivo' => 'required|file|mimes:pdf',
            'fotoCapa' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'autores' => 'required|array|min:1',
            'autores.*' => 'required|string|max:255'
        ]);
    
        $livro = new Livro();
        $livro->titulo = $request->titulo;
        $livro->numero_paginas = $request->numero_paginas;
        $livro->user_id = auth()->user()->id; // Atribui o ID do usuário logado
    
        // Salva o arquivo PDF
        $livro->arquivo = $request->file('arquivo')->store('arquivos', 'public');
        
        // Salva a foto da capa e armazena apenas o caminho no banco
        $fotoCapaPath = $request->file('fotoCapa')->store('capas', 'public');
        $livro->fotoCapa = $fotoCapaPath;  // Salva o caminho no banco de dados
        
        $livro->save(); // Salva o livro antes de associar os autores
    
        // Processa os autores e faz a ligação com o livro
        foreach ($request->autores as $autorNome) {
            $autor = Autor::firstOrCreate(['nome' => $autorNome]);
            $livro->autores()->attach($autor->id); // Associa o autor ao livro
        }
    
        return response()->json(['message' => 'Livro adicionado com sucesso!']);
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show($id)
{
    
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
   
}



public function update(Request $request, $id)
{
}


    

    /**
     * Update the specified resource in storage.
     */
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livro = Livro::where('id', $id)->where('user_id', auth()->user()->id)->firstOrFail();
    
    $livro->delete();

    return response()->json(['message' => 'Livro removido com sucesso!']);
    }
}
