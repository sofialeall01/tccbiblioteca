<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Contact - Bibliotec Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- Favicons -->
  <link href="{{asset('tema/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('tema/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
  <style>#successMessage {
    color: rgb(92, 201, 201); /* Verde água */
    text-align: center;

    .position-relative .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: rgb(92, 201, 201); /* Verde-água */
        cursor: pointer;
    }
}
</style>

</head>

<body class="contact-page">

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
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Perfil</h1>
              
            </div>
          </div>
        </div>
      </div>
      
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="info-wrap" data-aos="fade-up" data-aos-delay="200">
    <div class="row gy-5">
        <div class="col-lg-4">
            <div class="info-item d-flex align-items-center">
                <i class="fas fa-user"></i>
                <div>
                    <h3>{{ Auth::user()->email }}</h3>
                </div>
            </div>
        </div><!-- End Info Item -->
    </div>
</div>

       <!-- Modal de Edição de Email -->
       <div class="modal fade" id="editarEmailModal" tabindex="-1" aria-labelledby="editarEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: black; color: rgb(92, 201, 201);">
            <div class="modal-header">
                <h5 class="modal-title" id="editarEmailModalLabel">Editar Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
            </div>
            <div class="modal-body">
                <form id="editarEmailForm">
                    @csrf
                    <div class="mb-3">
                        <label for="currentEmail" class="form-label" style="color:white;">Email Cadastrado</label>
                        <input type="email" class="form-control" id="currentEmail" name="currentEmail"
                         value="{{ auth()->user()->email }}" readonly style="background-color: black; color: white;">
                    </div>
                    <div class="mb-3">
                        <label for="newEmail" class="form-label" style="color:white;">Novo Email</label>
                        <input type="email" class="form-control" id="newEmail" name="newEmail"
                            placeholder="Digite o novo email" required style="background-color: black; color: white;">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary"
                            style="background-color: black; color: rgb(92, 201, 201); border: 1px solid white;">Editar Email</button>
                        <button type="button" class="btn btn-secondary"
                            style="background-color: black; color: rgb(92, 201, 201); border: 1px solid white;" 
                            id="editPasswordButton">Editar Senha</button>
                    </div>
                    <div id="successMessage" style="display: none; color: rgb(92, 201, 201); text-align: center;">
                        Email atualizado com sucesso!
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
          <!-- Link para abrir o modal -->
                <p>Deseja <a href="#" id="editEmailLink" data-bs-toggle="modal" data-bs-target="#editarEmailModal">editar</a> sua conta?</p>
          <script>
           
           document.getElementById('editarEmailForm').addEventListener('submit', function (e) {
   // e.preventDefault(); // Impede o comportamento padrão do formulário

    const form = this;
    const formData = new FormData(form);

    fetch("{{ route('editar.email') }}", {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
    })
        .then(response => {
            if (!response.ok) {
                throw response;
            }
            return response.json();
        })
        .then(data => {
            alert('Email atualizado com sucesso!');
            form.reset(); // Limpa os campos do formulário após o sucesso
        })
        .catch(async (error) => {
            if (error.status === 422) {
                const errorData = await error.json();
                const errors = errorData.errors;
                let errorMessage = '';

                // Monta a mensagem de erro
                for (let field in errors) {
                    errorMessage += `${errors[field][0]}\n`;
                }

                alert(errorMessage);
            } else {
                alert('Ocorreu um erro inesperado. Tente novamente.');
            }
        });
});


          </script>
               
    <!-- Modal de Edição de Senha -->
    <div class="modal fade" id="editarSenhaModal" tabindex="-1" aria-labelledby="editarSenhaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: black; color: rgb(92, 201, 201);">
            <div class="modal-header">
                <h5 class="modal-title" id="editarSenhaModalLabel">Editar Senha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
            </div>
            <div class="modal-body">
                <form id="editarSenhaForm" method="POST" action="{{ route('usuario.atualizar-senha') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="emailSenha" class="form-label" style="color:white;">Email Cadastrado</label>
                        <input type="email" class="form-control" id="emailSenha" name="emailSenha" 
                         value="{{ Auth::user()->email }}" readonly required style="background-color: black; color: white;">
                         </div>
                    <div class="mb-3 position-relative">
                        <label for="senhaAtual" class="form-label" style="color:white;">Senha Atual</label>
                        <input type="password" class="form-control" id="senhaAtual" name="senhaAtual" required style="background-color: black; color: white;">
                        <i class="toggle-password fas fa-eye" data-input="senhaAtual"></i>
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="novaSenha" class="form-label" style="color:white;">Nova Senha</label>
                        <input type="password" class="form-control" id="novaSenha" name="novaSenha" required style="background-color: black; color: white;">
                        <i class="toggle-password fas fa-eye" data-input="novaSenha"></i>
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="novaSenha_confirmation" class="form-label" style="color:white;">Confirme a Nova Senha</label>
                        <input type="password" class="form-control" id="novaSenha_confirmation" name="novaSenha_confirmation" required style="background-color: black; color: white;">
                        <i class="toggle-password fas fa-eye" data-input="novaSenha_confirmation"></i>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" style="background-color: black; color: rgb(92, 201, 201); border: 1px solid white;">Editar Senha</button>
                    </div>
                </form>
                <div id="successMessage" style="display: none; color: rgb(92, 201, 201); text-align: center;">Senha atualizada com sucesso!</div>
                <div id="errorMessage" style="display: none; color: red; text-align: center;"></div>
            </div>
        </div>
    </div>
</div>

    <script>
        document.getElementById('editPasswordButton').addEventListener('click', function () {
    // Seleciona o modal pelo ID
    const modal = new bootstrap.Modal(document.getElementById('editarSenhaModal'));

    // Abre o modal
    modal.show();
});

       document.querySelectorAll('.toggle-password').forEach(toggle => {
    toggle.addEventListener('click', function () {
        const input = document.getElementById(this.getAttribute('data-input'));
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

                // Trocar o ícone
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });


        document.getElementById('editarSenhaForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Impede o comportamento padrão do formulário

    const form = this;
    const formData = new FormData(form);

    fetch("{{ route('usuario.atualizar-senha') }}", {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
    })
        .then(response => {
            if (!response.ok) {
                throw response; // Lança o erro para o bloco `catch`
            }
            return response.json(); // Converte para JSON se a resposta for bem-sucedida
        })
        .then(data => {
            // Redireciona para a página de perfil após sucesso
            alert("Senha atualizada com sucesso!");
            window.location.href = "{{ route('perfil') }}"; // Redireciona para a página de perfil
        })
        .catch(async (error) => {
            if (error.status === 422) {
                const errorData = await error.json(); // Converte os erros para JSON
                const errors = errorData.errors;
                let errorMessage = "";

                // Monta a mensagem de erro
                for (let field in errors) {
                    errorMessage += `${errors[field][0]}\n`;
                }

                // Exibe os erros em formato de alert
                alert(errorMessage);
            } else {
                alert("Ocorreu um erro inesperado. Tente novamente.");
            }
        });
});

</script>

<p>Deseja <a href="#" id="logout-link">sair</a> da sua conta?</p>
<script>
  document.getElementById('logout-link').addEventListener('click', function(event) {
  event.preventDefault(); // Previne que o link redirecione imediatamente

  // SweetAlert2 - Confirmação de logout
  Swal.fire({
    title: 'Tem certeza?',
    text: "Você realmente deseja sair da sua conta?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: ' rgb(92, 201, 201',
    cancelButtonColor: 'black',
    confirmButtonText: 'Sim, sair!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      // Verifique se o token CSRF está presente
      const csrfToken = document.querySelector('meta[name="csrf-token"]');
      if (csrfToken) {
        // Envia uma requisição POST para o logout
        fetch("{{ route('logout') }}", {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': csrfToken.getAttribute('content') // Acessa o token CSRF
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.message) {
            // Exibe a mensagem de sucesso e redireciona para a página de login
            Swal.fire({
              title: 'Logout realizado com sucesso!',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location.href = "{{ route('login') }}"; // Redireciona para a página de login
            });
          }
        })
        .catch(error => {
          console.error('Erro no logout:', error);
          Swal.fire({
            title: 'Erro!',
            text: 'Ocorreu um erro ao tentar sair. Tente novamente.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        });
      } else {
        console.error('Token CSRF não encontrado');
        Swal.fire({
          title: 'Erro!',
          text: 'Token CSRF não encontrado. Não foi possível realizar o logout.',
          icon: 'error',
          confirmButtonText: 'OK'
        });
      }
    }
  });
});

</script>
<!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">BiblioTec</strong> <span>All Rights Reserved</span></p>
      </div>
      
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

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