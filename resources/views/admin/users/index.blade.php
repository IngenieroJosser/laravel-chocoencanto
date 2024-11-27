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
    src: url('../../fonts/Nunito-Regular.ttf') format('truetype');
}

@font-face {
    font-family: 'Roboto';
    src: url('../../fonts/Roboto-Regular.ttf') format('truetype');
}

/* Estilo de la tabla */
table {
    width: 100%;
    border-collapse: collapse;
    background-color: var(--color-two);
    margin-bottom: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

th, td {
    padding: 16px 30px;
    text-align: left;
    font-family: 'Nunito', sans-serif;
    font-size: 16px;
    color: var(--text);
    border-bottom: 2px solid var(--color-three);
}

th {
    background: linear-gradient(135deg, var(--color-four), var(--color-six));
    color: var(--text-two);
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
}

tbody tr:nth-child(odd) {
    background-color: var(--color-two);
}

tbody tr:nth-child(even) {
    background-color: var(--bg);
}

tbody tr:hover {
    background-color: var(--bg-hover);
    cursor: pointer;
}

tbody tr td {
    transition: all 0.3s ease;
}

tbody tr td:hover {
    color: var(--color-five);
}

/* Botones */
.btn {
    padding: 12px 20px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 50px;
    display: inline-block;
    cursor: pointer;
    border: none;
    transition: transform 0.3s ease, background-color 0.3s ease;
    text-decoration: none;
    text-align: center;
}

.btn-sm {
    padding: 8px 16px;
    font-size: 12px;
}

.btn-warning {
    background-color: var(--color-five);
    color: var(--text-two);
}

.btn-warning:hover {
    background-color: #9bff53;
    transform: translateY(-5px);
}

.btn-danger {
    background-color: var(--color-six);
    color: var(--text-two);
}

.btn-danger:hover {
    background-color: #024d56;
    transform: translateY(-5px);
}

.btn-primary {
    background-color: var(--color-one);
    color: var(--text-two);
    margin-top: 30px;
}

.btn-primary:hover {
    background-color: #1ee39b;
    transform: translateY(-5px);
}

/* Título */
h1 {
    color: var(--color-four);
    font-size: 3.2rem;
    margin-bottom: 40px;
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
    text-align: center;
    letter-spacing: 2px;
    text-transform: uppercase;
}

/* Crear usuario */
a.btn-primary {
    padding: 10px 30px;
    font-size: 16px;
    font-weight: 600;
    background-color: var(--color-one);
    color: var(--text-two);
    border-radius: 30px;
    text-decoration: none;
    text-align: center;
}

a.btn-primary:hover {
    background-color: #1ee39b;
    transform: translateY(-5px);
}

/* Contenedor */
.container {
    padding: 40px 60px;
    max-width: 1200px;
    margin: 0 auto;
    background-color: var(--color-two);
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

</style>

<h1>Lista de Usuarios</h1>
<table class="table">
<a href="{{ route('admin.users.create') }}" style="text-decoration: none; font-family: 'Nunito';" class="btn btn-primary">Crear Usuario</a>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->user }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a style="text-decoration: none;" href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

