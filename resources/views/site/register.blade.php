<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ChocóEncanto</title>
    <link href="{{ url('../../../../css/components/log/sign-up.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/favicon-16x16.png') }}" type="image/png">

</head>
<body>
    @include('partials.header')
    <form action="/site/register" method="post" class="form-container" id="registerForm">
        @csrf
        <h2 class="form-title">Únete a disfrutar</h2>
        <p class="form-description">Únete a disfrutar ingresando tu nombre, dirección de correo electrónico y contraseña para disfrutar.</p>
        
        <div class="form-group">
            <label for="Usuario">Usuario</label>
            <input type="text" name="user" id="Usuario" required />
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" placeholder="email@address.com" id="email" required />
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required minlength="8" />
            <small id="passwordHelp" class="form-text text-muted">La contraseña debe tener al menos 8 caracteres.</small>
        </div>

        
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required />
        </div>

        <button type="submit" class="form-submit-btn">Únete a explorar</button>
    </form>
    <a class="login" href="{{ url('/login') }}">Inicia sesión y comienza a disfrutar de nuestra naturaleza!!</a>


   <!-- Modal de éxito -->
    <div id="successModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <span id="successMessage" style="color: green; font-family: 'text';">Usuario registrado con éxito.</span>
        </div>
    </div>


    <!-- Modal de error -->
    <div id="errorModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="this.parentElement.parentElement.style.display='none'">&times;</span>
            <p style="color: red; font-family: 'text';" id="errorMessage"></p>
        </div>
    </div>


    <script src="{{ asset('js/AuthRegister.js') }}"></script>
</body>
</html>
