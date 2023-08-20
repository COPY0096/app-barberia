<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::all();
        
        return view ('admin.productos.index', ['productos' => $productos]);
    }

    public function mostrar()
    {
        //
        $productos = Producto::all();
        
        return view ('Usuarios.mostrarprod', ['productos' => $productos]);
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        Producto::create($request->all());
        return redirect()->route('compra')->with('success', 'Nuevo compra realizada exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $producto = Producto::find($id);
    return view('productos.show', compact('producto'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //return view('edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $cliente->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Inventario actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
