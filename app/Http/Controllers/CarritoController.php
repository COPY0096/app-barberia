<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Importar el modelo Producto

class CarritoController extends Controller
{
    public function agregarProducto(Request $request, Producto $producto)
    {
        // Aquí puedes implementar la lógica para agregar el producto al carrito.
        // Puedes guardar la información en la base de datos o en la sesión del usuario.
        // Por ejemplo:
        // Agregar código para guardar $producto en el carrito
        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }
}
