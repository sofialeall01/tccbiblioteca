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
    public function getPdf($id)
{
    try {
        // Busca o livro pelo ID
        $livro = Livro::findOrFail($id);

        // Verifica se o arquivo do livro existe
        if (!$livro->arquivo) {
            return response()->json(['success' => false, 'message' => 'Arquivo PDF não encontrado.']);
        }

        // Monta a URL completa do PDF
        $pdfUrl = asset('storage/arquivos/' . $livro->arquivo);

        return response()->json([
            'success' => true,
            'titulo' => $livro->titulo,
            'pdfUrl' => $pdfUrl,
        ]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'message' => 'Erro ao buscar o livro.']);
    }
}

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
                $validated = $request->validate([
                    'livro_id' => 'required|exists:livro,id',
                    'data_inicio_leitura' => 'nullable|date',
                    'data_fim_leitura' => 'nullable|date',
                ]);
        
                $historico = \App\Models\Historico::firstOrCreate(
                    [
                        'user_id' => Auth::id(),
                        'livro_id' => $validated['livro_id'],
                    ]
                );
        
                if (!empty($validated['data_inicio_leitura'])) {
                    $historico->data_inicio_leitura = $validated['data_inicio_leitura'];
                }
        
                if (!empty($validated['data_fim_leitura'])) {
                    $historico->data_fim_leitura = $validated['data_fim_leitura'];
                }
        
                $historico->save();
        
                Log::info('Histórico salvo:', $historico->toArray());
        
                return response()->json(['message' => 'Data salva com sucesso!']);
            } catch (\Exception $e) {
                Log::error('Erro ao salvar:', ['error' => $e->getMessage()]);
                return response()->json(['message' => 'Erro ao salvar a data.', 'error' => $e->getMessage()], 500);
            }
        }
        

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
    
    public function updateAutores(Request $request, $id)
{
    $livro = Livro::findOrFail($id);  // Encontrar o livro pelo ID

    // Valida os dados de autores
    $request->validate([
        'autores' => 'required|array|min:1',
        'autores.*.id' => 'required|integer|exists:autor,id',  // Valida o ID do autor existente
        'autores.*.nome' => 'required|string|max:255',  // Verifica o nome de cada autor
    ]);

    // Desassociar os autores antigos
    $livro->autores()->detach();

    // Associar os novos autores (os existentes)
    foreach ($request->autores as $autor) {
        // Atualizar o nome do autor existente
        $existingAutor = Autor::find($autor['id']);
        if ($existingAutor) {
            $existingAutor->update(['nome' => $autor['nome']]);  // Atualiza o nome do autor
            $livro->autores()->attach($existingAutor->id);  // Reassocia o autor ao livro
        }
    }

    return response()->json(['success' => true, 'message' => 'Autores atualizados com sucesso!']);
}


    
    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Busca o livro pelo ID
    $livro = Livro::findOrFail($id);

    // Passa a URL do arquivo PDF diretamente
    return view('livros.index', compact('livro'));
}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
   
}



public function update(Request $request, $id)
{
    $request->validate([
        'titulo' => 'nullable|string|max:255',
        'numero_paginas' => 'nullable|integer',
        'arquivo' => 'nullable|file|mimes:pdf',
        'fotoCapa' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $livro = Livro::findOrFail($id);

    if ($request->filled('titulo')) {
        $livro->titulo = $request->titulo;
    }

    if ($request->filled('numero_paginas')) {
        $livro->numero_paginas = $request->numero_paginas;
    }

    if ($request->hasFile('arquivo')) {
        $livro->arquivo = $request->file('arquivo')->store('arquivos', 'public');
    }

    if ($request->hasFile('fotoCapa')) {
        $livro->fotoCapa = $request->file('fotoCapa')->store('capas', 'public');
    }

    $livro->save();

    return response()->json(['message' => 'Livro atualizado com sucesso!']);
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

    public function exibir($id)
{
    // Busca o livro pelo ID
    $livro = Livro::find($id);

    // Verifica se o livro existe
    if (!$livro) {
        abort(404, 'Livro não encontrado.');
    }

    // Retorna a view com o caminho do arquivo PDF
    return view('exibir', ['livro' => $livro]);
}
public function mostrar($id)
{
    // Busca o livro pelo ID
    $livro = Livro::find($id);

    // Verifica se o livro existe
    if (!$livro) {
        abort(404, 'Livro não encontrado.');
    }

    // Retorna a view com o caminho do arquivo PDF
    return view('mostrarPDF', ['livro' => $livro]);
}
}
