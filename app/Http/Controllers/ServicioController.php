<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        //
            $servicios = Servicio::all();
        
        return view ('admin.servicios.index', ['servicios' => $servicios]);
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
            'nombre_servicio' => 'required',
            'descripcion_servicio' => 'required',
            'precio_servicio' => 'required',
            'duracion_servicio' => 'required'
        ]);

        Servicio::create($request->all());
        return redirect()->route('servicio')->with('success', 'Nuevo servicio agregado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio): view
    {
        //
        return view('edit', ['servicio' => $servicio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio): RedirectResponse
    {
        //
        $request->validate([
            'nombre_servicio' => 'required',
            'descripcion_servicio' => 'required',
            'precio_servicio' => 'required',
            'duracion_servicio' => 'required'
        ]);

        $servicio->update($request->all());
        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio): RedirectResponse
    {
        //
        $servicio->delete();
        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado exitosamente!');
    }
}
