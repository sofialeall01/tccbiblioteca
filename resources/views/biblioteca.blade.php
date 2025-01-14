<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Gallery - Bibliotec Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- Favicons -->
  <link href="{{asset('tema/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('tema/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="{{asset('tema/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- PDF.js (Apenas a versão 2.16.105) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";
</script>


  <!-- Main CSS File -->
  <link href="{{asset('tema/assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bibliotec
  * Template URL: https://bootstrapmade.com/Bibliotec-bootstrap-photography-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
  .search-form {
    display: flex;
    justify-content: center; /* Centraliza os itens horizontalmente */
  }

  /* Estilo para o input */
  .search-form input {
    background-color: black;
    color: rgb(92, 201, 201);
    border: 1px solid white;
    padding: 10px;
    margin-right: 10px; /* Espaço entre o input e o botão */
  }

  /* Estilo para o input quando estiver em foco */
  .search-form input:focus {
    background-color: black; /* Mantém a cor de fundo preta */
    outline: none;
    color: white; /* Remove a borda azul padrão do navegador */
  }

  /* Estilo para o placeholder */
  .search-form input::placeholder {
    color: rgba(92, 201, 201, 0.7); /* Define a cor do placeholder */
  }

  .modal {
    z-index: 1050; /* O valor padrão do z-index do Bootstrap para o modal */
}
.modal-backdrop {
    z-index: 1040 !important; /* Garantir que o backdrop não se sobreponha ao modal */
}

.modal.show {
    display: block !important;
}

  /* Estilo para o botão */
  .search-form button {
    background-color: black;
    color: rgb(92, 201, 201);
    border: 1px solid white;
    padding: 10px 20px;
  }
      /* Ajuste adicional para garantir o layout da tabela */
    #gallery .gallery-item {
        width: 200px;
        margin-right: 250px; /* Ajuste conforme necessário */
        text-align: center;
    }

   
    .gallery-item img {
        width: 250px;
        height: 300px; /* Ajuste conforme necessário */
       
        border-radius: 5px; /* Opcional, apenas para visual mais amigável */
    }

  
    .edit-btn, .save-btn {
    background-color: black;
    border: none;
    padding: 5px;
    border-radius: 5px;
    transition: none; /* Remove o efeito de transição */
}

.edit-btn i, .save-btn i {
    color: #20b2aa;
}

/* Evitar qualquer efeito de hover */
.edit-btn:hover, .save-btn:hover {
    background-color: black; /* Manter a cor de fundo preta */
}

.edit-btn:focus, .save-btn:focus {
    outline: none; /* Remover o contorno de foco */
}






</style>


<body class="gallery-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="fas fa-book"></i>
        <h1 class="sitename">BiblioTec</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('inicio') }}">Início</a></li> 
          <li><a href="{{ route('livros.index') }}"><span>Biblioteca</span></a></li>
          <li><a href="{{ route('perfil') }}">Perfil</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        
      </div>

    </div>
  </header>

  <main class="main">

   <!-- Exibir formulário de pesquisa -->
<div class="page-title" data-aos="fade">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Biblioteca</h1>
                    <form action="/buscar" method="GET" class="search-form">
                        <input type="search" name="query" class="form-control" placeholder="Pesquisar livros..." required>
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="gallery" class="gallery section">
    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 gy-4 justify-content-start">
            @forelse($livros as $livro)
                <!-- Card de cada livro -->
                <div class="col">
                    <div class="gallery-item h-100" style="width: 200px;">
                        <!-- Exibindo a capa do livro -->
                        <img src="{{ asset(path: 'storage/' . $livro->fotoCapa) }}" class="img-fluid" style="width: 200px; height: auto;">

                        <!-- Links de ação -->
                        <div class="gallery-links d-flex align-items-center justify-content-center">
                            <!-- Link para visualizar o PDF -->

                            <a href="{{ route('livro.mostrar', ['id' => $livro->id]) }}" 
   data-livro-id="{{ $livro->id }}" 
   data-user-id="{{ Auth::id() }}" 
   class="preview-link" 
   id="updateLivrariaLink{{ $livro->id }}">
    <i class="bi bi-arrows-angle-expand"></i> <!-- Agora o ícone está dentro de um link com a classe 'preview-link' -->
</a>


    


                            <!-- Formulário para remoção -->
                            <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display: inline;" id="deleteForm{{ $livro->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" title="Remover" class="delete-link" style="background: none; border: none; cursor: pointer; color: red;" data-id="{{ $livro->id }}">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>

                            <!-- Ícone para abrir modal -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#infoModal{{ $livro->id }}">
                                <i class="bi bi-info-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal de informações -->
                <div class="modal fade" id="infoModal{{ $livro->id }}" tabindex="-1" aria-labelledby="infoModalLabel{{ $livro->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: black; color: white;">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel{{ $livro->id }}">Informações do Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
            </div>
            <div class="modal-body">
                <!-- Formulário para edição -->
                <form id="editLivroForm{{ $livro->id }}" action="{{ route('livros.update', $livro->id) }}" method="PUT" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Ou use PUT se for necessário -->
                    <!-- Título -->
                    <div class="mb-3">
    <label for="titulo" class="form-label"><strong>Título:</strong></label>
    <div class="d-flex align-items-center">
        <span id="tituloSpan{{ $livro->id }}">{{ $livro->titulo }}</span>
        <input type="text" id="tituloInput{{ $livro->id }}" class="form-control d-none" name="titulo" value="{{ $livro->titulo }}">
        <button type="button" class="btn btn-sm btn-primary ms-2 edit-btn" onclick="toggleEdit('titulo', {{ $livro->id }})">
            <i class="fas fa-edit"></i>
        </button>
        <button type="button" class="btn btn-sm btn-success ms-2 d-none save-btn" onclick="saveEdit('titulo', {{ $livro->id }})">
            <i class="fas fa-save"></i>
        </button>
    </div>
</div>

<div class="mb-3">
    <label for="numero_paginas" class="form-label"><strong>Número de Páginas:</strong></label>
    <div class="d-flex align-items-center">
        <span id="numero_paginasSpan{{ $livro->id }}">{{ $livro->numero_paginas }}</span>
        <input 
            type="number" 
            id="numero_paginasInput{{ $livro->id }}" 
            class="form-control d-none" 
            name="numero_paginas" 
            value="{{ $livro->numero_paginas }}"
        >
        <button 
            type="button" 
            class="btn btn-sm btn-primary ms-2 edit-btn" 
            onclick="toggleEdit('numero_paginas', {{ $livro->id }})"
        >
            <i class="fas fa-edit"></i>
        </button>
        <button 
            type="button" 
            class="btn btn-sm btn-success ms-2 d-none save-btn" 
            onclick="saveEdit('numero_paginas', {{ $livro->id }})"
        >
            <i class="fas fa-save"></i>
        </button>
    </div>
</div>



<div class="mb-3">
    <label for="autor" class="form-label"><strong>Autor(s):</strong></label>
    <div class="d-flex align-items-center" id="authorSection{{ $livro->id }}">
        <!-- Exibição dos autores -->
        <span id="autorSpan{{ $livro->id }}">
            {{ $livro->autores->pluck('nome')->join(', ') }}
        </span>

        <!-- Campos de input para edição dos autores -->
        <div id="autorInputs{{ $livro->id }}" class="d-none">
            <!-- Adiciona inputs dinamicamente para cada autor -->
            @foreach ($livro->autores as $autor)
    <input type="text" name="autores[{{ $autor->id }}]" 
           value="{{ $autor->nome }}" 
           class="form-control mb-2" 
           data-id="{{ $autor->id }}">
@endforeach

        </div>

        <!-- Botão para alternar entre exibição e edição -->
        <button type="button" class="btn btn-sm btn-primary ms-2 edit-btn" 
                onclick="toggleEditAuthors({{ $livro->id }})">
            <i class="fas fa-edit"></i>
        </button>

        <!-- Botão para salvar alterações -->
        <button type="button" class="btn btn-sm btn-success ms-2 d-none save-btn" 
                onclick="saveAuthorsEdit({{ $livro->id }})">
            <i class="fas fa-save"></i>
        </button>
    </div>
</div>

<div class="mb-3">
    <label for="arquivo" class="form-label"><strong>Arquivo:</strong></label>
    <div class="d-flex align-items-center">
        <span id="arquivoSpan{{ $livro->id }}">
            {{ $livro->arquivo ? 'Arquivo disponível' : 'Nenhum arquivo disponível' }}
        </span>
        <input type="file" id="arquivoInput{{ $livro->id }}" class="form-control d-none" name="arquivo" accept="application/pdf">
        <button type="button" class="btn btn-sm btn-primary ms-2 edit-btn" onclick="toggleEdit('arquivo', {{ $livro->id }})">
            <i class="fas fa-edit"></i>
        </button>
        <button type="button" class="btn btn-sm btn-success ms-2 d-none save-btn" onclick="saveEdit('arquivo', {{ $livro->id }})">
            <i class="fas fa-save"></i>
        </button>
    </div>
</div>

<div class="mb-3">
    <label for="fotoCapa" class="form-label"><strong>Foto da Capa :</strong></label>
    <div class="d-flex align-items-center">
        <span id="fotoCapaSpan{{ $livro->id }}">
            {{ $livro->fotoCapa ? 'Foto disponível' : 'Nenhuma foto disponível' }}
        </span>
        <input type="file" id="fotoCapaInput{{ $livro->id }}" class="form-control d-none" name="fotoCapa" accept="image/jpeg, image/png, image/jpg">
        <button type="button" class="btn btn-sm btn-primary ms-2 edit-btn" onclick="toggleEdit('fotoCapa', {{ $livro->id }})">
            <i class="fas fa-edit"></i>
        </button>
        <button type="button" class="btn btn-sm btn-success ms-2 d-none save-btn" onclick="saveEdit('fotoCapa', {{ $livro->id }})">
            <i class="fas fa-save"></i>
        </button>
    </div>
</div>


                </form>
                                <!-- Campo para Data de Início -->
                                <div class="mb-3">
                                    <label for="inputDataInicio" class="form-label">Data de Início</label>
                                    <input type="date" id="inputDataInicio" class="form-control"
                                        value="{{ old('data_inicio_leitura', isset($historicos[$livro->id]) ? $historicos[$livro->id]->data_inicio_leitura : '') }}" />
                                    <button id="btnSalvarInicio" data-livro-id="{{ $livro->id }}" class="btn btn-success mt-2">
                                        <i class="fa fa-check icone-certo"></i>
                                    </button>
                                </div>

                                <!-- Exibir Data de Fim -->
                                <div class="mb-3">
                                    <label for="inputDataFim" class="form-label">Data de Fim</label>
                                    <input type="date" id="inputDataFim" class="form-control"
                                        value="{{ old('data_fim_leitura', isset($historicos[$livro->id]) ? $historicos[$livro->id]->data_fim_leitura : '') }}" />
                                    <button id="btnSalvarFim" data-livro-id="{{ $livro->id }}" class="btn btn-success mt-2">
                                        <i class="fa fa-check icone-certo"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Exibir mensagens de sucesso ou erro -->
                            <div id="mensagem{{ $livro->id }}" class="alert d-none"></div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    Nenhum livro encontrado.
                </div>
            @endforelse
        </div>
    </div>
</section>
<script>
    function toggleEditAuthors(id) {
    const authorInputs = document.querySelectorAll(`#autorInputs${id} input[name^="autores"]`);

    authorInputs.forEach(input => {
        console.log("Autor ID:", input.dataset.id);  // Verifique o ID do autor no console
    });

    // Obtém os autores separados por vírgula
    const authors = document.getElementById(`autorSpan${id}`).innerText.split(', ');

    const authorSection = document.getElementById(`authorSection${id}`);
    const authorInputsDiv = document.getElementById(`autorInputs${id}`);
    const editButton = authorSection.querySelector('.edit-btn');
    const saveButton = authorSection.querySelector('.save-btn');
    
    // Alterna entre exibição e edição
    if (authorInputsDiv.classList.contains('d-none')) {
        // Exibe os campos de edição
        authorInputsDiv.classList.remove('d-none');
        editButton.classList.add('d-none');
        saveButton.classList.remove('d-none');

        // Limpa os campos existentes
        authorInputsDiv.innerHTML = '';

        // Preenche os campos com os autores separados
        authors.forEach((author, index) => {
            const inputGroup = document.createElement('div');
            inputGroup.classList.add('input-group', 'mb-2');
            
            // Criação do campo input para o autor
            const input = document.createElement('input');
            input.type = 'text';
            input.classList.add('form-control');
            input.name = `autores[${index}]`;
            input.value = author; // Atribui o nome do autor
            input.required = true;
            input.style.backgroundColor = 'black';
            input.style.color = 'white';
            input.dataset.id = index + 1;  // Exemplo de atribuição de ID dinâmico, substitua conforme necessário

            // Adiciona apenas o campo de input (sem o botão de remoção)
            inputGroup.appendChild(input);
            authorInputsDiv.appendChild(inputGroup);
        });
    } else {
        // Retorna à exibição normal
        authorInputsDiv.classList.add('d-none');
        editButton.classList.remove('d-none');
        saveButton.classList.add('d-none');
    }
}

function saveAuthorsEdit(id) {
    console.log(`Livro ID: ${id}`);
    
    const authorInputs = document.querySelectorAll(`#autorInputs${id} input[name^="autores"]`);
    console.log(authorInputs); // Mostra todos os inputs encontrados
    
    const authors = Array.from(authorInputs).map(input => {
        console.log(`Input ID: ${input.dataset.id}, Nome: ${input.value.trim()}`);
        return {
            id: input.dataset.id,  // O ID do autor que já está na tabela "autor"
            nome: input.value.trim()  // Nome do autor que será atualizado
        };
    });

    console.log('Autores extraídos:', authors);

    // Verifique se há dados válidos
    if (authors.length === 0 || authors.some(a => !a.nome)) {
        alert('Todos os campos de autores devem ser preenchidos.');
        return;
    }

    // Envia os dados via AJAX para o backend
    fetch(`/livros/${id}/update-autores`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ autores: authors }), // Transforma o array em JSON
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro ao atualizar os autores.');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert('Autores atualizados com sucesso!');
            // Atualiza a exibição dos autores editados
            document.getElementById(`autorSpan${id}`).innerText = authors.map(a => a.nome).join(', ');
            toggleEditAuthors(id);

            // Recarrega a página após o sucesso
            window.location.reload();
        } else {
            alert(data.message || 'Erro ao atualizar os autores.');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Houve um erro ao tentar salvar os autores.');
    });
}

</script>
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Função para alternar entre edição e visualização
    function toggleEdit(field, id) {
        document.getElementById(`${field}Span${id}`).classList.toggle('d-none');
        document.getElementById(`${field}Input${id}`).classList.toggle('d-none');
        const editButton = document.querySelector(`#${field}Span${id} ~ .edit-btn`);
        const saveButton = document.querySelector(`#${field}Input${id} ~ .save-btn`);
        if (editButton && saveButton) {
            editButton.classList.toggle('d-none');
            saveButton.classList.toggle('d-none');
        }
    }

    // Função para salvar a edição
    // Função para salvar as alterações via AJAX
    function saveEdit(field, livroId) {
    let formData = new FormData();
    let livroForm = document.getElementById('editLivroForm' + livroId);

    // Adicionar o método PUT explicitamente ao FormData
    formData.append('_method', 'PUT'); // Para garantir que o Laravel trate como PUT
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

    // Adicionar campos individuais
    let input = document.getElementById(field + 'Input' + livroId);
    formData.append(field, input.files ? input.files[0] : input.value); // Verificar se é arquivo ou texto

    // Enviar o AJAX
    fetch(livroForm.action, {
        method: 'POST', // Use POST, mas Laravel irá processar como PUT
        body: formData,
    })
    .then(response => {
        // Verificar se a resposta foi bem-sucedida (status 200)
        if (!response.ok) {
            throw new Error('Erro na requisição: ' + response.statusText);
        }
        return response.json(); // Tentar converter a resposta para JSON
    })
    .then(data => {
        if (data.message) {
            alert(data.message); // Mostrar mensagem de sucesso
            location.reload(); // Recarregar a página após a atualização
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        // Exibir uma mensagem de erro mais amigável ao usuário
        alert('Ocorreu um erro ao editar o livro. Tente novamente.');
    });
}

</script>


<script>
    document.querySelectorAll('.preview-link').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Previne o comportamento padrão do link

        const livroId = this.getAttribute('data-livro-id'); // ID do livro clicado
        const userId = this.getAttribute('data-user-id'); // ID do usuário logado
        const url = this.getAttribute('href'); // URL da rota para 'livro.exibir'

        // Enviar dados para o controlador via AJAX
        fetch("{{ route('salvar.livro') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                livro_id: livroId, // Envia o ID do livro
                user_id: userId // Envia o ID do usuário
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na requisição');
            }
            return response.json();
        })
        .then(data => {
            console.log(data.message); // Exibe a mensagem de sucesso no console
            window.location.href = url; // Redireciona para a URL do livro
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Ocorreu um erro ao atualizar o livro. Tente novamente.');
        });
    });
});

</script>
    

<script>
    // Exclusão de livro com confirmação
    document.querySelectorAll(".delete-link").forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            const livroId = button.getAttribute("data-id");
            const form = document.getElementById("deleteForm" + livroId);

            Swal.fire({
                title: "Tem certeza?",
                text: "Você realmente deseja excluir este livro?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "rgb(92, 201, 201)",
                cancelButtonColor: "black",
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(form.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document
                                .querySelector("meta[name='csrf-token']")
                                .getAttribute("content"),
                        },
                        body: new FormData(form),
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.message) {
                                Swal.fire("Excluído!", data.message, "success").then(
                                    () => {
                                        window.location.reload();
                                    }
                                );
                            }
                        })
                        .catch((error) => {
                            console.error("Erro:", error);
                            Swal.fire(
                                "Erro!",
                                "Ocorreu um erro ao excluir o livro.",
                                "error"
                            );
                        });
                }
            });
        });
    });
    $(document).on("click", "#btnSalvarInicio", function () {
    let livroId = $(this).data("livro-id");
    let dataInicio = $("#inputDataInicio").val();

    $.ajax({
        url: "/historico/salvar",
        method: "POST",
        data: {
            livro_id: livroId,
            data_inicio_leitura: dataInicio,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            alert(response.message);
        },
        error: function (xhr) {
            alert("Erro ao salvar data de início: " + xhr.responseJSON.message);
        },
    });
});

$(document).on("click", "#btnSalvarFim", function () {
    let livroId = $(this).data("livro-id");
    let dataFim = $("#inputDataFim").val();

    $.ajax({
        url: "/historico/salvar",
        method: "POST",
        data: {
            livro_id: livroId,
            data_fim_leitura: dataFim,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            alert(response.message);
        },
        error: function (xhr) {
            alert("Erro ao salvar data de fim: " + xhr.responseJSON.message);
        },
    });
});
</script>

</section>




  

</section>

  </main>

  

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div class="line"></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{asset('tema/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('tema/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('tema/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('tema/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('tema/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('tema/assets/js/main.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>
 <!-- <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
              <img src="assets/img/gallery/gallery-2.jpg" class="img-fluid" alt="">
              <div class="gallery-links d-flex align-items-center justify-content-center">
                <a href="assets/img/gallery/gallery-2.jpg" title="Gallery 2" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                
              </div>
            </div>
          </div>End Gallery Item -->
</html>