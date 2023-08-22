<?php
namespace App\Http\Controllers;

use App\Models\Cita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CitaController extends Controller
{
 

    public function store(Request $request)
{
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'id_cita' => 'required|int',
        'fecha_creacion' => 'required|time',
        // Agrega las validaciones para los otros campos
    ]);

    // Crear y almacenar la cita en la base de datos
    $cita = new Cita([
        'id_cita' => $validatedData['id_cita'],
        'fecha_creacion' => $validatedData['fecha_creacion'],
        // Completa los campos restantes
    ]);
    $cita->save();

    return redirect()->route('cita.index')->with('success', 'Cita creada exitosamente.');
}

   
    
}
