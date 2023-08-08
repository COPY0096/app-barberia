<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        $this->middleware('auth');
    }


    public function index(): View
    {
        //
        $empleados = Empleado::all();
        
        return view ('admin.empleados.index', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required'
        ]);

        Empleado::create($request->all());
        return redirect()->route('empleado')->with('success', 'Nuevo empleado agregado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado): view
    {
        //
        return view('edit', ['empleado' => $empleado]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado): RedirectResponse
    {
        //
        
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required'
        ]);

        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado): RedirectResponse
    {
        //
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente!');
    }
}
