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
        $citas = Cita::all();
        return view('citas.index', ['citas' => $citas]);
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'barbero' => 'required',
            // Agrega más validaciones según tus campos
        ]);

        Cita::create($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente!');
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
            'nombre' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'barbero' => 'required',
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
}
