<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ProductoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});






Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
    return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/home',[HomeController::class,'index'])->name('home');

    Route::get('/control/cita', [CitaController::class, 'index'])->name('control.cita');
    Route::get('/admin/compras', [ProductoController::class, 'index'])->name('compra');
    Route::get('/mantenimiento/cliente', [ClienteController::class, 'index'])->name('cliente');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/clientes', [ClienteController::class, 'clientes.index'])->name('clientes');

Route::resource('clientes', ClienteController::class);
Route::resource('productos', ProductoController::class);
Route::resource('citas', CitaController::class);

require __DIR__.'/auth.php';
