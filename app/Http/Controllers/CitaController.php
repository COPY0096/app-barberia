<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        //

        $citas = Cita::all();
        
        return view ('admin.citas.index', ['citas' => $citas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
            'id_cliente' => 'required',
            'id_empleado' => 'required'
        ]);

        Cita::create($request->all());
        return redirect()->route('control.cita')->with('success', 'Cita creada exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita): view
    {
        //
        return view('edit', ['cita' => $cita]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita): RedirectResponse
    {
        //
        $request->validate([
            'id_cliente' => 'required',
            'id_empleado' => 'required'
        ]);

        $cita->update($request->all());
        return redirect()->route('control.cita')->with('success', 'Cita actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        //
    }
}
