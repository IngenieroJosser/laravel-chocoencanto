<style>
    :root {
    --color-one: #55F5A3;   /* Verde brillante */
    --color-two: #F6F4EE;   /* Beige suave */
    --color-three: #9a9393; /* Gris oscuro */
    --color-four: #15191E;  /* Negro elegante */
    --color-five: #baff29;  /* Amarillo luminoso */
    --color-six: #051923;   /* Azul profundo */
    --color-seven: #868F9F; /* Gris azulado */
    --text: #000000;        /* Texto negro */
    --text-two: #FFFFFF;    /* Texto blanco */
    --bg: #f2f2f2;          /* Fondo claro */
    --bg-hover: rgba(242, 242, 242, 0.5); /* Fondo al pasar el ratón */
}

/* Fuentes */
@font-face {
    font-family: 'Nunito';
    src: url('app/Http/Controllers/fonts/Nunito-Light.ttf') format('truetype');
}

@font-face {
    font-family: 'titleForm';
    src: url('app/Http/Controllers/fonts/Ichiji-Two.otf') format('truetype');
}

/* Estilo general del formulario */
form {
    width: 100%;
    max-width: 600px;
    margin: 40px auto;
    padding: 30px;
    background-color: var(--color-two);
    border-radius: 10px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    font-family: 'Roboto';
    font-size: 2.5rem;
    color: var(--color-four);
    margin-bottom: 30px;
    font-weight: 700;
}

/* Estilo de los campos del formulario */
.form-group {
    margin-bottom: 20px;
}

label {
    font-size: 16px;
    font-weight: 600;
    color: var(--color-four);
    margin-bottom: 10px;
    display: block;
    font-family: 'Roboto';
}

input.form-control {
    width: 100%;
    padding: 12px 18px;
    font-size: 16px;
    color: var(--text);
    border: 2px solid var(--color-three);
    border-radius: 8px;
    background-color: var(--bg);
    transition: all 0.3s ease;
}

input.form-control:focus {
    border-color: var(--color-one);
    box-shadow: 0 0 5px rgba(85, 245, 163, 0.8);
    outline: none;
}

/* Estilo de los botones */
.btn-primary {
    width: 100%;
    background-color: #051923;
    border: 2px solid #baff29;
    padding: 1em 3.5em;
    color: #ffffff;
    cursor: pointer;
    display: block;
    margin: 2em auto;
    font-family: 'Roboto';
}

.btn-primary:hover {
    transform: translateY(-5px);
    background-color: #051923;
    border: 3px solid #ffffff;
    filter: drop-shadow(10px 7px 10px #07190f);
}

/* Estilo del formulario en dispositivos móviles */
@media (max-width: 768px) {
    form {
        padding: 20px;
    }

    h1 {
        font-size: 2rem;
    }

    input.form-control {
        font-size: 14px;
        padding: 10px;
    }

    .btn-primary {
        font-size: 16px;
        padding: 12px;
    }
}

</style>

<h1>Crear Usuario</h1>
<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear Usuario</button>
</form>
