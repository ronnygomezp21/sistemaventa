<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Models\Producto;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $usuarios = User::count();
        $productos = Producto::count();
        return view('dashboard', compact('usuarios', 'productos'));
    })->name('dashboard');
    Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');
    Route::get('/producto/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('producto.create');
    Route::post('/productos', [App\Http\Controllers\ProductoController::class, 'store'])->name('producto.store');
    //rutas cliente
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    //fin rutas cliente
    
});

Route::group(['middleware' => ['auth']], function () {
    route::resource('roles', RolController::class);
    route::resource('usuarios', UsuarioController::class);
    Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    route::resource('permisos', PermisoController::class);
});
