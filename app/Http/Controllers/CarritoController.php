<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItems = $user->carts;
        return view('cart.index', compact('cartItems'));
    }

    public function addProduct(Request $request)
    {
        $user = Auth::user();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $user->carts()->attach($productId, ['quantity' => $quantity]);

        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito.');
    }

    public function removeProduct(Request $request)
    {
        $user = Auth::user();
        $productId = $request->input('product_id');

        $user->carts()->detach($productId);

        return redirect()->route('carrito.index')->with('success', 'Producto removido del carrito.');
    }
}
