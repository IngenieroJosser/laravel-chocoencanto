<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//                  views
Route::get('/', function () {
    return view('site/index');
});

Route::get('/reservas', function () {
    return view('site.reservas');
})->name('reservas');

Route::get('/experiencias', function () {
    return view('site/experiencias');
});

Route::get('/register', function () {
    return view('site/register');
});

Route::get('/login', function () {
    return view('site/login');
});

Route::get('/dashboard', function () {
    return view('site.dashboard');
});



//                  controller
// controlador de registro
use App\Http\Controllers\Auth\RegisterController;

Route::post('site/register', [RegisterController::class, 'registerUser']);



// controlador de inicio de sesión
use App\Http\Controllers\Auth\LoginController;

// muestra el formulario de inicio de sesión
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// maneja el envío del formulario de inicio de sesión
Route::post('/login', [LoginController::class, 'login']);

// ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// controlador para las reserva
use App\Http\Controllers\Reserves\ReservaController;

// Rutas para las reservas
Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas_create');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas_store');
