<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * Registrar un nuevo usuario.
     */
    public function registerUser(Request $request)
    {
        // Validación de datos de entrada
        $validator = Validator::make($request->all(), [
            'user' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Manejo de errores de validación
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        // Creación del usuario
        $user = UserModel::create([
            'user' => $request->input('user'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Respuesta de éxito
        return response()->json([
            'message' => 'Usuario registrado con éxito.',
            'user' => $user
        ]);
    }
}
