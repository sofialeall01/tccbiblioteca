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

  <!-- Vendor CSS Files -->
  <link href="{{asset('tema/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



  

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

    #gallery img {
        width: 100%;
        height: auto;
    }

    .icone-certo {
    color: rgb(92, 201, 201); /* Cor do ícone */
    font-size: 24px; /* Tamanho do ícone */
    background-color: black; /* Fundo preto */
    border-radius: 50%; /* Borda arredondada */
    padding: 5px; /* Espaçamento interno */
    border: none !important; /* Força a remoção de qualquer borda */
    box-shadow: none !important; /* Remover qualquer sombra */
    transition: transform 0.3s ease, color 0.3s ease; /* Efeito de transição */
}

.icone-certo:hover {
    color: black; /* Cor do ícone ao passar o mouse */
    background-color: rgb(92, 201, 201); /* Cor de fundo ao passar o mouse */
    transform: scale(1.1); /* Aumenta o ícone ao passar o mouse */
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
        <div class="row gy-4 justify-content-start">
            @forelse($livros as $livro)
                <!-- Card de cada livro -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="gallery-item h-100">
                        <!-- Exibindo a capa do livro -->
                        <img src="{{ asset('storage/' . $livro->fotoCapa) }}" class="img-fluid" style="width: 100%; height: auto; max-width: 200px;">

                        <!-- Links de ação -->
                        <div class="gallery-links d-flex align-items-center justify-content-center">
                            <!-- Link para visualizar o PDF -->
                            <a href="#" title="{{ $livro->titulo }}" class="preview-link" data-bs-toggle="modal" data-bs-target="#pdfModal{{ $livro->id }}">
                                <i class="bi bi-arrows-angle-expand"></i>
                            </a>

                            <!-- Modal para exibir o PDF -->
                            <div class="modal fade" id="pdfModal{{ $livro->id }}" tabindex="-1" aria-labelledby="pdfModalLabel{{ $livro->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content" style="background-color: black; color: rgb(92, 201, 201);">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pdfModalLabel{{ $livro->id }}">Visualizando: {{ $livro->titulo }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe src="{{ asset('storage/arquivos/' . $livro->arquivo) }}" style="width: 100%; height: 80vh;" frameborder="0"></iframe>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: black; color: rgb(92, 201, 201); border: 1px solid white;">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Link para edição -->
                            <a href="javascript:void(0)" title="Editar" class="edit-link" onclick="openEditModal({{ $livro->id }})">
                                <i class="bi bi-pencil-square"></i>
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
                                <p><strong>Título:</strong> {{ $livro->titulo }}</p>
                                @if($livro->autores->isNotEmpty())
                                    <p><strong>Autores:</strong> {{ $livro->autores->pluck('nome')->join(', ') }}</p>
                                @else
                                    <p><strong>Autores:</strong> Nenhum autor cadastrado.</p>
                                @endif
                                <p><strong>Número de Páginas:</strong> {{ $livro->numero_paginas }}</p>
                                <div



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
                               
                               
                                <!-- Mensagens de Sucesso ou Erro -->
                                <div id="mensagem{{ $livro->id }}" class="alert d-none"></div>
                            </div>
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
              //excluirlivro
          document.querySelectorAll('.delete-link').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Impede o comportamento padrão de envio do formulário

                const livroId = button.getAttribute('data-id');
                const form = document.getElementById('deleteForm' + livroId); // Pega o formulário correspondente

                // Confirmação de exclusão com SweetAlert
                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Você realmente deseja excluir este livro?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: ' rgb(92, 201, 201',
                    cancelButtonColor: 'black',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Envia o formulário via AJAX (fetch)
                        fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: new FormData(form)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                Swal.fire(
                                    'Excluído!',
                                    data.message,
                                    'success'
                                ).then(() => {
                                    // Após o sucesso, pode redirecionar ou remover o item da lista
                                    window.location.reload(); // Recarrega a página ou você pode remover o item manualmente
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Erro:', error);
                            Swal.fire('Erro!', 'Ocorreu um erro ao excluir o livro.', 'error');
                        });
                    }
                });
            });
        });

      // Salvando Data de Início
$(document).on('click', '[id^="btnSalvarInicio_"]', function () {
    let livroId = $(this).data('livro-id'); // Pega o ID do livro associado
    let dataInicio = $(`#inputDataInicio_${livroId}`).val(); // Captura o valor da data de início

    $.ajax({
        url: '/historico/salvar',
        method: 'POST',
        data: {
            livro_id: livroId,
            data_inicio_leitura: dataInicio,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            alert(response.message); // Exibe mensagem de sucesso
            location.reload(); // Recarrega a página para atualizar os dados
        },
        error: function (xhr) {
            alert('Erro ao salvar data de início: ' + (xhr.responseJSON?.message || 'Erro desconhecido.'));
        }
    });
});

// Salvando Data de Fim
$(document).on('click', '[id^="btnSalvarFim_"]', function () {
    let livroId = $(this).data('livro-id'); // Pega o ID do livro associado
    let dataFim = $(`#inputDataFim_${livroId}`).val(); // Captura o valor da data de fim

    $.ajax({
        url: '/historico/salvar',
        method: 'POST',
        data: {
            livro_id: livroId,
            data_fim_leitura: dataFim,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            alert(response.message); // Exibe mensagem de sucesso
            location.reload(); // Recarrega a página para atualizar os dados
        },
        error: function (xhr) {
            alert('Erro ao salvar data de fim: ' + (xhr.responseJSON?.message || 'Erro desconhecido.'));
        }
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