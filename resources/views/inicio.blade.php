<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>About - Bibliotec Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('tema/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('tema/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap"
    rel="stylesheet">

  <!-- Bootstrap CSS -->
  <!-- Sem 'integrity' e 'crossorigin' -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


  <!-- Vendor CSS Files -->
  <link href="{{asset('tema/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('tema/assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bibliotec
  * Template URL: https://bootstrapmade.com/Bibliotec-bootstrap-photography-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .btn-custom {
        background-color: rgb(92, 201, 201); /* Verde água */
        color: black; /* Cor do ícone */
        border: none;
    }

   
</style>
</head>





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

<section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-4">
                <h1>Lendo Agora</h1>
                @if ($livro && $livro->fotoCapa)
                    <img src="{{ Storage::url($livro->fotoCapa) }}" class="img-fluid" alt="Capa do Livro">
                
                @endif
            </div>
            <div class="col-lg-5 content">
             
                <p class="fst-italic py-3">
                    Informações sobre sua leitura
                </p>
                @if ($livro)
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> Título: <span>{{ $livro->titulo }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> Autor: <span> {{ $livro->autores->pluck('nome')->join(', ') }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> Número de páginas: <span>{{ $livro->numero_paginas }}</span></li>
                            </ul>
                        </div>
                    </div>
                @else
                    <p>Nenhum livro está sendo lido no momento.</p>
                @endif
            </div>
        </div>
    </div>
</section>


<!-- /About Section -->


  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Novo</h2>
      <p>
        <a href="#" id="showForm" style="color: white;">Inserir um novo livro</a>
      </p>
      <h6>Preencha o formulário</h6>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="livroModal" tabindex="-1" aria-labelledby="livroModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: black; color: rgb(92, 201, 201);">
            <div class="modal-header">
                <h5 class="modal-title" id="livroModalLabel">Adicionar Novo Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="livroForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label" style="color:white;">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required style="background-color: black; color: white;">
                    </div>
                    <div class="mb-3">
                        <label for="numeroPaginas" class="form-label" style="color:white;">Número de Páginas</label>
                        <input type="number" class="form-control" id="numeroPaginas" name="numero_paginas" required style="background-color: black; color: white">
                    </div>
                    <div class="mb-3" id="authorsSection">
                        <label for="autor" class="form-label" style="color:white;">Autor(s)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="autores[]" required style="background-color: black; color: white;">
                            <button type="button" class="btn btn-custom" onclick="addAuthorField()">+</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="arquivo" class="form-label" style="color:white;">Arquivo (PDF)</label>
                        <input type="file" class="form-control" id="arquivo" name="arquivo" accept=".pdf" required style="background-color: black; color: white;">
                    </div>
                    <div class="mb-3">
                        <label for="fotoCapa" class="form-label" style="color:white;">Capa do Livro</label>
                        <input type="file" class="form-control" id="fotoCapa" name="fotoCapa" accept="image/*" required style="background-color: black; color: white">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" style="background-color: black; color: rgb(92, 201, 201); border: 1px solid white;">Adicionar Livro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('showForm').addEventListener('click', function (event) {
        event.preventDefault(); // Evita que o link se comporte como um redirecionamento
        var livroModal = new bootstrap.Modal(document.getElementById('livroModal'));
        livroModal.show(); // Exibe o modal
    });

    // Função para adicionar um novo campo de autor
    function addAuthorField() {
        var authorFields = document.getElementById("authorsSection");
        var newAuthorField = document.createElement("div");
        newAuthorField.classList.add("input-group", "mb-3");
        newAuthorField.innerHTML = `
            <input type="text" class="form-control" name="autores[]" placeholder="Digite o nome do autor" required style="background-color: black; color: white;">
            <button type="button" class="btn btn-custom" onclick="removeAuthorField(this)">-</button>
        `;
        authorFields.appendChild(newAuthorField);
    }

    // Função para remover um campo de autor
    function removeAuthorField(button) {
        var authorField = button.closest('.input-group');
        authorField.remove();
    }

    document.getElementById('livroForm').addEventListener('submit', function (event) {
        event.preventDefault();

        var formData = new FormData(this);
        
        fetch('/adicionar-livro', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert(data.message);
                var livroModal = bootstrap.Modal.getInstance(document.getElementById('livroModal'));
                livroModal.hide();
                document.getElementById('livroForm').reset();
            } else {
                throw new Error("Erro ao adicionar livro");
            }
        })
        .catch(error => {
            console.error(error);
            alert("Erro ao adicionar livro. Por favor, tente novamente.");
        });
    });



</script>

    <!-- /Testimonials Section -->

  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Explore</h2>
      <p>Aqui estão algumas indicações </p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 1,
                "spaceBetween": 40
              },
              "1200": {
                "slidesPerView": 3,
                "spaceBetween": 1
              }
            }
          }
        </script>
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                  class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Publicado em 6 de abril de 1943, o livro conta a história de um príncipe que veio do asteroide B-612.
                Na Terra, ele encontra um aviador perdido e passa a contar as aventuras que vivenciou em outros
                planetas.
              </p>
              <div class="profile mt-auto">
                <img src="https://harpercollins.com.br/cdn/shop/products/9788595081512.jpg?v=1694502527" alt=""
                  style="width: 150px; height: 200px; object-fit: cover;">
                <h3>O Pequeno Príncipe</h3>
                <h4>Antoine de Saint-Exupéry</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                  class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                O pai está desempregado, e a família passa por dificuldades. O menino vive aprontando,
                sem jamais se conformar com as limitações que o mundo lhe impõe
              <div class="profile mt-auto">
                <img src="https://m.media-amazon.com/images/I/816a7zMD+FL._AC_UF1000,1000_QL80_.jpg" alt=""
                  style="width: 150px; height: 200px; object-fit: cover;">
                <h3> Meu Pé de Laranja Lima</h3>
                <h4> José Mauro de Vasconcelos</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                  class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>Harry Potter é um garoto órfão que vive infeliz com seus tios, os Dursleys.
                Ele recebe uma carta contendo um convite para ingressar em Hogwarts, uma famosa escola especializada em
                formar jovens bruxos. </p>
              <div class="profile mt-auto">
                <img src="https://m.media-amazon.com/images/I/81ibfYk4qmL._AC_UF1000,1000_QL80_.jpg" alt=""
                  style="width: 150px; height: 200px; object-fit: cover;">
                <h3>Harry Potter e a Pedra Filosofal</h3>
                <h4> J. K. Rowling</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                  class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                A história de Orgulho e Preconceito gira em torno das cinco irmãs Bennet, que viviam na área rural do
                interior da Inglaterra, no século XVIII.
                Aborda a questão da sucessão em uma família sem herdeiros homens, dentro de uma sociedade patriarcal.
              </p>
              <div class="profile mt-auto">
                <img src="https://m.media-amazon.com/images/I/71fj3qrLmFL._AC_UF1000,1000_QL80_.jpg" alt=""
                  style="width: 150px; height: 200px; object-fit: cover;">
                <h3>Orgulho e Preconceito</h3>
                <h4>Jane Austen</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                  class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Durante o verão de seus quinze anos, as férias idílicas de Cadence são interrompidas quando a garota
                sofre um estranho acidente.
                Ela passa os próximos dois anos em um período conturbado, com amnésia, depressão, fortes dores de cabeça
                e muitos analgésicos.
              </p>
              <div class="profile mt-auto">
                <img src="https://m.media-amazon.com/images/I/71bJYZfcrKL._AC_UF350,350_QL50_.jpg" alt=""
                  style="width: 150px; height: 200px; object-fit: cover;">
                <h3>Mentirosos</h3>
                <h4>E. Lockhart</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

  </section><!-- /Testimonials Section -->
</main>



<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>