<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiColombiaController extends Controller
{
    public function getRegions()
    {
        // Realiza la solicitud GET
        $response = Http::get('https://api-colombia.com/api/v1/Region');

        // Verifica si la solicitud fue exitosa
        if ($response->successful()) {
            $regions = $response->json(); // Decodifica el JSON a un arreglo PHP
            return view('regions.index', compact('regions')); // Pasa los datos a la vista
        } else {
            return response()->json(['error' => 'Error al conectar con la API'], 500);
        }
    }
}
