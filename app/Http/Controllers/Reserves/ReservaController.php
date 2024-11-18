<?php

namespace App\Http\Controllers\Reserves;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function store(Request $request)
    {
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

        try {
            // Crear una nueva reserva
            $reserva = new Reserva();
            $reserva->destino = $request->destino;
            $reserva->fecha_inicio = $request->fecha_inicio;
            $reserva->fecha_fin = $request->fecha_fin;
            $reserva->numero_personas = $request->numero_personas;
            $reserva->tipo_tour = $request->tipo_tour;
            $reserva->transporte = $request->has('transporte') ? true : false;
            $reserva->hospedaje = $request->has('hospedaje') ? true : false;
            $reserva->alimentacion = $request->has('alimentacion') ? true : false;
            $reserva->comentarios = $request->comentarios;
            $reserva->metodo_pago = $request->metodo_pago;
            $reserva->user_id = Auth::id();

            $reserva->save();

            return response()->json(['success' => true, 'message' => 'Reserva realizada exitosamente.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Ocurrió un error al realizar la reserva.', 'error' => $e->getMessage()], 500);
        }
    }

    public function getReserveData()
    {
        // Obtener el conteo de reservas agrupado por mes
        $data = Reserva::raw(function ($collection) {
            return $collection->aggregate([
                [
                    '$group' => [
                        '_id' => ['$month' => ['$toDate' => '$fecha_inicio']],
                        'total_reservas' => ['$sum' => 1],
                    ],
                ],
                [
                    '$sort' => ['_id' => 1],
                ],
            ]);
        });

        // Convertir los datos en un formato más amigable
        $formattedData = [];
        foreach ($data as $entry) {
            $formattedData[] = [
                'month' => $entry['_id'],
                'total_reservas' => $entry['total_reservas'],
            ];
        }

        return response()->json($formattedData);
    }

    public function dashboardListReserves()
    {
        // Obtener todas las reservas
        $reserves = Reserva::all();

        // Pasar las reservas a la vista
        return view('site.reservas', compact('reserves'));
    }
}
