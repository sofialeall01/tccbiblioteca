<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Services - Bibliotec Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('tema/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('tema/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">




  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('tema/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('tema/assets/vendor/aos/aos.css" rel="stylesheet')}}">
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
</head>

<body class="services-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="fas fa-book"></i>
        <h1 class="sitename">BiblioTec</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        
      </div>



    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Junte-se a nos!</h1>
              <p class="mb-0"> Aqui, cada página é uma nova aventura e cada historia é um convite para explorar mundos desconhecidos.
                 Esperamos que sua jornada de leitura aqui seja repleta de descobertas e prazer. Aproveite e boa leitura!</p>
                 <a href="{{ route('login') }}" class="cta-btn" style="background-color: black; color: rgb(92, 201, 201); border: 1px solid white;" >
                  Quero participar<br>
                </a>
               
            </div>
          </div>
        </div>
      </div>
     
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="fa-regular fa-star"></i></i></div>
              <h4 class="stretched-link">Imaginação</h4>
              <p>Ao visualizar cenários e personagens descritos nos livros, a mente cria imagens e situações únicas. 
               </p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="fa-solid fa-bomb"></i></i></div>
              <h4 class="stretched-link">Redução do Estresse</h4>
              <p>Mergulhar em um bom livro pode servir como uma fuga saudável do estresse diário.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="fa-solid fa-person"></i></i></div>
              <h4 class="stretched-link">Comunicação</h4>
              <p>O contato com diferentes estilos e estruturas de texto ajuda os
                 leitores a expressarem suas próprias ideias de forma mais clara e eficaz.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="fa-solid fa-brain"></i></i></div>
              <h4 class="stretched-link">Desenvolvimento Cognitivo e Intelectual</h4>
              <p> A leitura estimula o cérebro, melhora a memória e a capacidade de concentração. </p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Funcionalidades</h2>
        <p>O que o site tem a oferecer?</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 gx-lg-5">

          <div class="col-lg-6">
            <div class="pricing-item d-flex justify-content-between">
              <h3>Crie você mesmo a sua biblioteca</h3>
             
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-6">
            <div class="pricing-item d-flex justify-content-between">
              <h3>Tenha acesso sempre,em qualquer lugar</h3>
             
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-6">
            <div class="pricing-item d-flex justify-content-between">
              <h3>Desing intuitivo e facil de usar</h3>
             
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-6">
            <div class="pricing-item d-flex justify-content-between">
              <h3>Uma Biblioteca com todos os livros que você inseriu
              </h3>
             
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-6">
            <div class="pricing-item d-flex justify-content-between">
              <h3>Perfil do usuario</h3>
              
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-6">
            <div class="pricing-item d-flex justify-content-between">
              <h3>Tudo gratuito</h3>
              
            </div>
          </div><!-- End Pricing Item -->

        </div>

      </div>

    </section><!-- /Pricing Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Explore</h2>
        <p>Conheça alguns escritores</p>
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
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Richard Russell Riordan Jr., mais conhecido como Rick Riordan, é um escritor norte-americano,
                   mais conhecido por escrever a série Percy Jackson e Os Olimpianos de 2005 a 2009.
                </p>
                <div class="profile mt-auto">
                  <img src="https://www.booquiz.com/storage/authors_pictures/zuZSzeqGSSM1JnYrqtBvUTZqy8Y9COPzkzNnMm9V.jpeg" class="testimonial-img" alt="">
                  <h3>Rick Riordan</h3>
                  <h4>autor de Percy Jackson e os Olimpianos</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Sarah J. Maas é uma escritora norte-americana de fantasia. Sua obra alcançou o patamar
                   de best-seller do New York Times e USA Today.
                <div class="profile mt-auto">
                  <img src="https://images-na.ssl-images-amazon.com/images/S/amzn-author-media-prod/lrl2v1leaksru6628gnernrop0.jpg" class="testimonial-img" alt="">
                  <h3> Sarah J. Maas</h3>
                  <h4>autora de Corte de Espinhos e Rosas</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>Augusto Jorge Cury é um psiquiatra, professor e escritor brasileiro.
                   Augusto é autor da Teoria da Inteligência Multifocal e seus livros foram publicados em mais de 70 países.            </p>
                <div class="profile mt-auto">
                  <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRyYXEJs0QQ_e3ncNxgA4Qn2vX0lKHSES3pQYz3j8QE051pBxTi" class="testimonial-img" alt="">
                  <h3>Augusto Cury</h3>
                  <h4>autor de O Vendedor de Sonhos</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Nicholas Sparks é um escritor, roteirista e produtor estadunidense. 
                  Vários de seus livros entraram na lista de best-sellers do New York Times.           </p>
                <div class="profile mt-auto">
                  <img src="https://m.media-amazon.com/images/S/amzn-author-media-prod/ij85cnbiortcbujmf1qhmmh92.jpg" class="testimonial-img" alt="">
                  <h3> Nicholas Sparksn</h3>
                  <h4>autor de Querido John</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Thalita Rebouças Teixeira é uma jornalista, escritora,
                   roteirista, repórter e atriz brasileira, que escreve livros direcionados ao público adolescente.                </p>
                <div class="profile mt-auto">
                  <img src="https://i0.wp.com/www.zedudu.com.br/wp-content/uploads/2022/11/27595217.jpg?ssl=1" class="testimonial-img" alt="">
                  <h3>Thalita Rebouças</h3>
                  <h4>autora de Tudo Por Um Popstar </h4>
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

</body>

</html>