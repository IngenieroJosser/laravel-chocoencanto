<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para obtener el usuario autenticado

class ReservaController extends Controller
{

    public function create()
    {
        // Devolver la vista del formulario para crear una nueva reserva
        return view('site.reservas');  // Asegúrate de que la ruta sea correcta para tu formulario
    }

    /**
     * Almacenar una nueva reserva.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'destino' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'numero_personas' => 'required|integer|min:1',
            'tipo_tour' => 'required|string|max:100',
            'transporte' => 'nullable|boolean',
            'hospedaje' => 'nullable|boolean',
            'alimentacion' => 'nullable|boolean',
            'comentarios' => 'nullable|string',
            'metodo_pago' => 'required|string|max:100',
        ]);

        // Crear la reserva
        $reserva = new Reserva();
        $reserva->destino = $validatedData['destino'];
        $reserva->fecha_inicio = $validatedData['fecha_inicio'];
        $reserva->fecha_fin = $validatedData['fecha_fin'];
        $reserva->numero_personas = $validatedData['numero_personas'];
        $reserva->tipo_tour = $validatedData['tipo_tour'];
        $reserva->transporte = $request->boolean('transporte');
        $reserva->hospedaje = $request->boolean('hospedaje');
        $reserva->alimentacion = $request->boolean('alimentacion');
        $reserva->comentarios = $validatedData['comentarios'] ?? null;
        $reserva->metodo_pago = $validatedData['metodo_pago'];

        // Relacionar la reserva con el usuario autenticado
        $reserva->user_id = Auth::id();

        // Guardar la reserva en la base de datos
        $reserva->save();

        // Redirigir con un mensaje de éxito
        return redirect('/reservas')->with('success', 'Reserva realizada con éxito.');
    }
}
