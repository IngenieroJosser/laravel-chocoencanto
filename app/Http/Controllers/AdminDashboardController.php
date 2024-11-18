<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('site.dashboard');
    }

    public function dashboard()
    {   
        // Obtener todos los usuarios
        $users = UserModel::all(); // Asegúrate de que hay datos en la tabla de usuarios

        // Verifica si los usuarios se obtienen correctamente
        // dd($users); // Puedes descomentar esto para depurar

        return view('admin.dashboard', compact('users')); // Asegúrate de que la vista sea correcta
    }
}
