<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');  // Se o usuário não estiver logado, redireciona para login
        }
    
        $userId = auth()->user()->id;
        $livros = Livro::where('user_id', $userId)->get();  // Busca os livros do usuário logado
        
    
        return view('biblioteca', compact('livros'));  // Passa a variável livros para a view
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        
        // Retorna os dados do livro para preencher o modal
    return response()->json(livro);
    }


    public function update(Request $request, Livro $livro)
    {
        // Validação dos dados
        $validated = $request->validate([
            'titulo' => 'nullable|string|max:255',
            'numero_paginas' => 'nullable|integer',
            'autores' => 'nullable|array',
            'arquivo' => 'nullable|mimes:pdf',
            'fotoCapa' => 'nullable|image',
        ]);
    
        // Atualiza os campos
        if ($request->has('titulo')) {
            $livro->titulo = $request->titulo;
        }
        if ($request->has('numero_paginas')) {
            $livro->numero_paginas = $request->numero_paginas;
        }
        if ($request->has('autores')) {
            $livro->autores = implode(', ', $request->autores); // Adiciona autores
        }
        if ($request->hasFile('arquivo')) {
            $livro->arquivo = $request->file('arquivo')->store('arquivos');
        }
        if ($request->hasFile('fotoCapa')) {
            $livro->fotoCapa = $request->file('fotoCapa')->store('capas');
        }
    
        // Salva o livro atualizado
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
}
