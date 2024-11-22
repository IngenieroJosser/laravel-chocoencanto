<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    public function dashboardListUsers()
    {
        $users = UserModel::all();
        return view('site.dashboard', compact('users'));
    }

    public function dashboardListReserves()
    {
        $reserves = Reserva::all();
        return view('site.dashboard_reserves', compact('reserves'));
    }

    public function showRegions()
    {
        // Llamada a la API para obtener las regiones
        $response = Http::get(env('API_COLOMBIA_URL') . '/Region');

        // Verificamos si la respuesta fue exitosa y obtenemos los datos
        $regions = $response->successful() ? $response->json() : [];

        // Pasamos las regiones a la vista
        return view('site.dashboard', compact('regions'));
    }

    public function getAttractions()
    {
        // Llamada a la API para obtener las atracciones turísticas
        $response = Http::get('https://api-colombia.com/api/v1/TouristicAttraction');

        // Verificamos si la respuesta fue exitosa y obtenemos los datos
        $attractions = $response->successful() ? $response->json() : [];

        // Llamada a la API para obtener las regiones
        $regionsResponse = Http::get('https://api-colombia.com/api/v1/Region');
        $regions = $regionsResponse->successful() ? $regionsResponse->json() : [];

        // Pasamos las atracciones y las regiones a la vista
        return view('site.dashboard', compact('attractions', 'regions'));
    }


}
