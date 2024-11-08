<?php

namespace App\Http\Controllers\Reserves;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    // Muestra el formulario de reservas
    public function create()
    {
        return view('site.reservas'); // Asegúrate de que la vista está en resources/views/site/reservas.blade.php
    }

    // Maneja el envío del formulario de reservas
    public function store(Request $request)
    {
        try {
            $request->validate([
                'destino' => 'required|string',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
                'numero_personas' => 'required|integer|min:1',
                'tipo_tour' => 'required|string',
                'transporte' => 'nullable|boolean',
                'hospedaje' => 'nullable|boolean',
                'alimentacion' => 'nullable|boolean',
                'comentarios' => 'nullable|string',
                'metodo_pago' => 'required|string',
                'terminos' => 'accepted',
            ]);
            

            // Guarda la reserva
            Reserva::create($request->all());

            return response()->json([
                'success' => true,
                'message' => '¡Reserva realizada con éxito!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al procesar la reserva.',
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString() // Puedes usar esto para obtener más detalles sobre el error
            ], 500);
        }
    }


}
