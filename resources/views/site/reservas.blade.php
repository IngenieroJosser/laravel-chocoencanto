<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva - ChocóEncanto</title>
    <link href="{{ url('../../../../css/components/reserves/reservas.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/favicon-16x16.png') }}" type="image/png">
</head>
<body>
    @include('partials.header')

    <!-- Mensajes de éxito y error -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="form-wrapper">
        <form action="{{ route('reservas_store') }}" id="reserva-form" method="POST" class="form-container">
            @csrf
            <h2 class="form-title">Reserva para disfrutar</h2>
            <p class="form-description">
                Únete a disfrutar ingresando la información de tu viaje para disfrutar de una experiencia única en Quibdó.
            </p>

            <!-- Destino turístico -->
            <div class="form-group">
                <label for="destino">Destino turístico</label>
                <select id="destino" name="destino" required>
                    <option value="rio-atrato">Río Atrato</option>
                    <option value="bahia-solano">Bahía Solano</option>
                    <option value="nuqui">Nuquí</option>
                    <option value="selva-chocoana">Selva Chocoana</option>
                </select>
            </div>

            <!-- Fechas -->
            <div class="form-group">
                <label for="fecha-inicio">Fecha de inicio</label>
                <input type="date" id="fecha-inicio" name="fecha_inicio" required>
            </div>
            <div class="form-group">
                <label for="fecha-fin">Fecha de fin</label>
                <input type="date" id="fecha-fin" name="fecha_fin" required>
            </div>

            <!-- Número de personas -->
            <div class="form-group">
                <label for="personas">Número de personas</label>
                <input type="number" id="personas" name="numero_personas" min="1" value="1" required>
            </div>

            <!-- Tipo de tour -->
            <div class="form-group">
                <label for="tipo-tour">Tipo de tour</label>
                <select id="tipo-tour" name="tipo_tour" required>
                    <option value="aventura">Aventura</option>
                    <option value="cultural">Cultural</option>
                    <option value="ecoturismo">Ecoturismo</option>
                </select>
            </div>

            <!-- Opciones adicionales -->
            <fieldset class="form-group">
                <legend>Opciones adicionales:</legend>
                <label><input type="checkbox" name="transporte" value="1"> Transporte incluido</label>
                <label><input type="checkbox" name="hospedaje" value="1"> Hospedaje incluido</label>
                <label><input type="checkbox" name="alimentacion" value="1"> Alimentación incluida</label>
            </fieldset>

            <!-- Comentarios -->
            <div class="form-group">
                <label for="comentarios">Comentarios adicionales</label>
                <textarea id="comentarios" name="comentarios" placeholder="Escribe tus comentarios o necesidades especiales aquí"></textarea>
            </div>

            <!-- Método de pago -->
            <div class="form-group">
                <label for="metodo-pago">Método de pago</label>
                <select id="metodo-pago" name="metodo_pago" required>
                    <option value="tarjeta">Tarjeta de crédito</option>
                    <option value="transferencia">Transferencia bancaria</option>
                </select>
            </div>

            <!-- Términos y condiciones -->
            <div class="form-group">
                <label>
                    <input type="checkbox" name="terminos" required> Acepto los términos y condiciones
                </label>
            </div>

            <!-- Botón de enviar -->
            <button type="submit" class="form-submit-btn">Únete a explorar</button>
        </form>
    </div>
</body>
</html>
