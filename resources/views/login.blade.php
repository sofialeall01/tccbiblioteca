<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Seu CSS -->
    <link href="{{asset('tema/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('tema/assets/css/main.css')}}" rel="stylesheet">
</head>
<style>
    .error {
        color: red;
        font-size: 0.9em;
    }

    .toggle-password {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: black;
}
.position-relative {
    position: relative;
}
</style>


<body>
    <header id="header">
        <!-- Conteúdo do cabeçalho -->
    </header>

    <nav id="navmenu" class="navmenu"></nav>

    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

    <div class="container" id="container" data-aos="fade-up">
    <div class="form-container sign-up">
        <form id="registerForm" action="{{ route('usuario.store') }}" method="POST">
            @csrf
            <h1 style="color: black;">Criar uma conta</h1>
            <span style="color: black;">Use seu email para cadastro</span>
            <input type="email" name="email" placeholder="Email" required>
            
            <input id="password" type="password" name="password" placeholder="Senha" required >
           
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirme a Senha" required>

            <div id="passwordMatchError" class="error" style="display: none;"></div>
            <div id="passwordError" class="error" style="display: none;"></div>
            <button type="submit" style="background-color: black; color: rgb(92, 201, 201);">Criar Conta</button>
        </form>

   

        <script>
           
            document.addEventListener('DOMContentLoaded', function () {
                const passwordInput = document.getElementById('password');
                const passwordError = document.getElementById('passwordError');

                passwordInput.addEventListener('input', function () {
                    const passwordLength = passwordInput.value.length;

                    if (passwordLength < 8) {
                        passwordError.textContent = 'A senha deve ter pelo menos 8 caracteres.';
                        passwordError.style.display = 'block';
                    } else {
                        passwordError.textContent = '';
                        passwordError.style.display = 'none';
                    }
                });

                document.getElementById('registerForm').addEventListener('submit', function (event) {
                    if (passwordInput.value.length < 8) {
                        event.preventDefault();
                        passwordError.textContent = 'A senha deve ter pelo menos 8 caracteres.';
                        passwordError.style.display = 'block';
                    }
                });
            });
            
            const passwordInput = document.getElementById('password');
            const passwordConfirmationInput = document.getElementById('password_confirmation');
            const passwordMatchError = document.getElementById('passwordMatchError');

            document.getElementById('registerForm').addEventListener('submit', function (event) {
                if (passwordInput.value !== passwordConfirmationInput.value) {
                    event.preventDefault();
                    passwordMatchError.textContent = 'As senhas não coincidem.';
                    passwordMatchError.style.display = 'block';
                } else {
                    passwordMatchError.textContent = '';
                    passwordMatchError.style.display = 'none';
                }
            });
        </script>

</body>

</html>
</div>


        <div class="form-container sign-in">
            <form id="loginForm" action="{{ route('usuario.login') }}" method="POST">
                @csrf
                <h1 style="color: black;">Fazer Login</h1>
                <span style="color: black;">Use sua senha e email já cadastrados</span>
                <input id="userEmail" type="email" name="email" placeholder="Email" required>
                <input id="userPassword" type="password" name="password" placeholder="Senha" required>
                <div id="loginError" class="error" style="display: none; color: red;"></div>
                <button type="submit" style="background-color: black; color: rgb(92, 201, 201);">Entrar</button>

                @if ($errors->has('login_error'))
                    <div class="error" style="color: red;">
                        {{ $errors->first('login_error') }}
                    </div>
                @endif
            </form>
        </div>


    
<div class="toggle-container">
    <div class="toggle" style="background: linear-gradient(to right, black, black);">
        <div class="toggle-panel toggle-left" style="background-color: black;">
            <h1 style="color: rgb(92, 201, 201);">Entre na sua conta!</h1>
            <p>Use sua senha e email já cadastrados</p>
            <button class="hidden" id="login" style="background-color: black; color: rgb(92, 201, 201);">Entrar</button>
        </div>
        <div class="toggle-panel toggle-right" style="background-color: black;">
            <h1 style="color: rgb(92, 201, 201);">Seja Bem-Vindo!</h1>
            <p>Registre-se com seus dados pessoais para usar todos os recursos do site</p>
            <button class="hidden" id="register"
                style="background-color: black; color: rgb(92, 201, 201);">Cadastre-se</button>
        </div>
    </div>
</div>
</div>
</nav>
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>



<div id="preloader">
    <div class="line"></div>
</div>


<!-- Vendor JS Files -->
<script src="{{asset('tema/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('tema/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('tema/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('tema/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('tema/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>


<!-- Seu JS -->
<script src="{{asset('tema/assets/js/script.js')}}"></script>
<script src="{{asset('tema/assets/js/main.js')}}"></script>
</body>

</html>