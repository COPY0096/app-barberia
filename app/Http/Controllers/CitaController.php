<?php
namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Servicio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Carbon\Carbon;



class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::with(['cliente', 'empleado', 'servicio'])->get()->map(function ($cita) {
            $cita->fecha_creacion = Carbon::parse($cita->fecha_creacion);
            return $cita;
        });
        
        
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $servicios = Servicio::all(); // Agrega esta línea para obtener los servicios
        
        return view('admin.procesos.control-citas', compact('citas', 'clientes', 'empleados', 'servicios'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('citas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required',
            'fecha_creacion' => 'required|date',
            // Agrega más validaciones si es necesario
        ]);

        $cita = new Cita();
        $cita->id_cliente = $request->input('id_cliente');
        $cita->id_empleado = $request->input('id_empleado');
        $cita->fecha_creacion = $request->input('fecha_creacion');
        $cita->estado = $request->input('estado');
        $cita->id_servicio = $request->input('id_servicio');
        $cita->razon_de_cancelacion = $request->input('razon_de_cancelacion');
        
        $cita->save();

        
        return redirect()->route('citas.index')->with('success', 'Cita agendada correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        return view('citas.show', ['cita' => $cita]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita): view
    {
        return view('citas.edit', ['cita' => $cita]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita): RedirectResponse
    {
        $request->validate([
            'id_cliente' => 'required',
            'fecha' => 'required|date',
            // Agrega más validaciones según tus campos
        ]);

        $cita->update($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente!');
    }
    public function actualizarEstado(Request $request, Cita $cita)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,completada,cancelada',
        ]);
    
        $cita->update(['estado' => $request->estado]);
    
        return redirect()->route('control-cita')->with('success', 'Estado de la cita actualizado exitosamente.');
    }
    
    public function actualizarRazonDeCancelacion(Request $request, Cita $cita)
    {
        $request->validate([
            'razon_de_cancelacion' => 'required',
        ]);

        $cita->update([
            'razon_de_cancelacion' => $request->razon_de_cancelacion,
        ]);

        return redirect()->route('citas.index')->with('success', 'Razón de cancelación actualizada exitosamente.');
    }

    public function createClienteCita()
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $servicios = Servicio::all();

        return view('Usuarios.crear-cita', compact('clientes', 'empleados', 'servicios'));
    }

    public function storeClienteCita(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required',
            'id_empleado' => 'required',
            'fecha_creacion' => 'required|date',
            // Otras validaciones aquí
        ]);

        $cita = new Cita([
            'id_cliente' => $request->input('id_cliente'),
            'id_empleado' => $request->input('id_empleado'),
            'fecha_creacion' => Carbon::parse($request->input('fecha_creacion')),
            'estado' => 'pendiente', // Puedes establecer el estado por defecto aquí
            'id_servicio' => $request->input('id_servicio'),
            'razon_de_cancelacion' => null,
        ]);

        $cita->save();

        return redirect()->route('inicio')->with('success', 'Cita agendada correctamente.');
    }

}
