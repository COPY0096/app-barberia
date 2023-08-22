<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VentaController;

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




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 Route::get('/', function () {
     //Datos para mostrar en la vista
     $serviciosPeluqueria = ['Corte de cabello', 'Tinte y coloración', 'Peinados y estilismo', 'Tratamientos capilares'];
     $serviciosSpa = ['Facial y cuidado de la piel', 'Tratamientos de masajes', 'Manicura y pedicura'];
     $mision = 'Nuestra misión es proporcionar servicios de peluquería y spa de alta calidad, cuidando la belleza y bienestar de nuestros clientes para que se sientan y luzcan lo mejor posible.';
     $vision = 'Nuestra visión es convertirnos en el salón de belleza líder en la industria, reconocido por la excelencia en nuestros servicios y el compromiso con la satisfacción del cliente.';
     $direccion = 'Santiago, RD';
     $telefono = '809-123-3456';
     $correo = 'correo@empresa.com';

     return view('Usuarios\index', compact('serviciosPeluqueria', 'serviciosSpa', 'mision', 'vision', 'direccion', 'telefono', 'correo'));
 })->name('inicio');

 Route::post('/cita', function () {
     //Lógica para almacenar la cita en la base de datos
     return redirect()->route('inicio')->with('success', 'Cita creada exitosamente.');
 })->name('cita.store');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::get('/redireccionar', function () {
    return view('home');
});

Route::get('/proceso/producto', [ProductoController::class, 'mostrar'])->name('mostrar');





Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
    return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/home',[HomeController::class,'index'])->name('home');

    // Route::get('/proceso/ControlCita', [CitaController::class, 'index'])->name('control-cita');
    Route::get('/proceso/compra', [CompraController::class, 'index'])->name('compra');
    Route::get('/proceso/venta', [VentaController::class, 'index'])->name('venta');
    Route::get('/mantenimiento/producto', [ProductoController::class, 'index'])->name('producto');
    Route::get('/mantenimiento/cliente', [ClienteController::class, 'index'])->name('cliente');
    Route::get('/mantenimiento/empleado', [EmpleadoController::class, 'index'])->name('empleado');
    Route::get('/mantenimiento/servicio', [ServicioController::class, 'index'])->name('servicio');
    Route::get('/mantenimiento/producto', [ProductoController::class, 'index'])->name('producto');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/proceso/ControlCita', [CitaController::class, 'index'])->name('control-cita');
    Route::post('/citas/{cita}/actualizar-estado', [CitaController::class, 'actualizarEstado'])->name('citas.actualizar-estado');

    Route::post('/citas/{cita}/actualizar-razon', [CitaController::class, 'actualizarRazonDeCancelacion'])
    ->name('citas.actualizar-razon');



});

// Route::get('/clientes', [ClienteController::class, 'clientes.index'])->name('clientes');

Route::resource('clientes', ClienteController::class);
Route::resource('productos', ProductoController::class);
Route::resource('citas', CitaController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('compras', CompraController::class);
Route::resource('ventas', VentaController::class);




require __DIR__.'/auth.php';
