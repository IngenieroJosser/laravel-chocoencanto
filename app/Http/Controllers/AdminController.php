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

    // CONTROLADORES PARA EL CRUD
    
    // Mostrar todos los usuarios
    public function index()
    {
        $users = UserModel::all();
        return view('admin.users.index', compact('users'));
    }

    // Mostrar el formulario para crear un usuario
    public function create()
    {
        return view('admin.users.create');
    }

    // Guardar un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Crear un nuevo usuario
        $user = UserModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado exitosamente.');
    }

    // Mostrar el formulario para editar un usuario
    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|min:6',
    ]);

    $user = UserModel::findOrFail($id); // Cambia UserModel si usas otro modelo
    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->password) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado exitosamente.');
}


    // Eliminar un usuario
    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
