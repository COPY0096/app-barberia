<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $compras = Compra::with('cliente', 'productos')->orderBy('created_at', 'desc')->paginate(10);
        // Asegúrate de reemplazar 'cliente' y 'productos' con las relaciones adecuadas en tu modelo Compra
    
        return view('admin.procesos.compras', ['compras' => $compras]);

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
        // Valida los datos del formulario de compra
        $request->validate([
            'id_cliente' => 'required',
            'id_producto' => 'required',
            'cantidad' => 'required|integer|min:1',
            // Agrega más validaciones según tus necesidades
        ]);

        // Crea una nueva instancia del modelo Compra
        $compra = new Compra();
        $compra->cliente_id = $request->input('id_cliente');
        $compra->save();

        // Agrega los productos comprados a la relación 'productos' de la compra
        $producto = Producto::find($request->input('id_producto'));
        $compra->productos()->attach($producto, ['cantidad' => $request->input('cantidad')]);

        // Puedes agregar más lógica aquí, como calcular el total de la compra, etc.

        return redirect()->route('compra')->with('success', 'Compra realizada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
