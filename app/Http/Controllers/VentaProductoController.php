<?php

namespace App\Http\Controllers;

use App\Models\VentaProducto;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;

class VentaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $productos = $request->input('productos', []);
    
        foreach ($productos as $productoId => $cantidad) {
            $producto = Producto::find($productoId);
    
            if ($producto) {
                $precioUnitario = $producto->precio_unitario;
    
                // Asociar el producto a la compra con su precio unitario
                $venta->productos()->attach($productoId, [
                    'cantidad' => $cantidad,
                    'precio_unitario' => $precioUnitario,
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VentaProducto $ventaProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VentaProducto $ventaProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VentaProducto $ventaProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VentaProducto $ventaProducto)
    {
        //
    }
}
