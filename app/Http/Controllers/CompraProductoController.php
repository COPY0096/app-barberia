<?php

namespace App\Http\Controllers;

use App\Models\CompraProducto;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Producto;


class CompraProductoController extends Controller
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
        // Validaciones y creación de la compra
    
        $productos = $request->input('productos', []);
    
        foreach ($productos as $productoId => $cantidad) {
            $producto = Producto::find($productoId);
    
            if ($producto) {
                $precioUnitario = $producto->precio_unitario;
    
                // Asociar el producto a la compra con su precio unitario
                $compra->productos()->attach($productoId, [
                    'cantidad' => $cantidad,
                    'precio_unitario' => $precioUnitario,
                ]);
            }
        }
    
        // Resto de la lógica de almacenamiento y redirección
    }
    

    /**
     * Display the specified resource.
     */
    public function show(CompraProducto $compraProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompraProducto $compraProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompraProducto $compraProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompraProducto $compraProducto)
    {
        //
    }
}
