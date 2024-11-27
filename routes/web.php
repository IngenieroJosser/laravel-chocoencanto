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
    return view('site.register'); // Ajusta el nombre de la vista según corresponda
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

Route::post('/register', [RegisterController::class, 'registerUser']);

// controlador de inicio de sesión
use App\Http\Controllers\Auth\LoginController;

// muestra el formulario de inicio de sesión
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// maneja el envío del formulario de inicio de sesión
Route::post('/login', [LoginController::class, 'login']);

// ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// controlador para las reserva

// use App\Http\Controllers\Reserves\ReservaController;
use App\Http\Controllers\ReservaController;

Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas_create');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas_store');



// controlador para la consulta de la lista de usuarios
use App\Http\Controllers\AdminController;

// Ruta para listar usuarios
Route::get('/dashboard', [AdminController::class, 'dashboardListUsers'])->name('dashboardListUsers');

// Ruta para listar reservas
Route::get('/dashboard/reserves', [AdminController::class, 'dashboardListReserves'])->name('dashboardListReserves');

// Ruta para mostrar las regiones
Route::get('/dashboard', [AdminController::class, 'showRegions'])->name('dashboard');

// Ruta del consumo de la API
Route::get('/show-regions', [AdminController::class, 'showRegions'])->name('show.regions');

// Mostra la API de las REGIONES
Route::get('/dashboard', [AdminController::class, 'showRegions'])->name('admin.dashboard');

// Muestra la API de Turismo
// Route::get('/dashboard', [AdminController::class, 'showAttractions']);
// Route::get('/admin/attractions', [AdminController::class, 'getAttractions'])->name('admin.attractions');

Route::get('/dashboard', [AdminController::class, 'getAttractions'])->name('admin.dashboard');


// CRUD
// Ruta para listar usuarios
Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');

// Ruta para mostrar el formulario de creación de usuario
Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');

// Ruta para almacenar un nuevo usuario
Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');

// Ruta para mostrar el formulario de edición de usuario
Route::get('/admin/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');

// Ruta para actualizar un usuario
Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');

// Ruta para eliminar un usuario
Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');