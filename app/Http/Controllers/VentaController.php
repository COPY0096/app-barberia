<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $arrayDetalleVenta = Venta::with('ventasProductos.producto')->get();


        $ventas = Venta::with('cliente', 'productos')->orderBy('created_at', 'desc')->paginate(10);
        $productos = Producto::all(); // Obtener todos los productos
        $this->productosList = Producto::all(); // Obtener todos los productos
        $clientes = Cliente::all();
        // Asegúrate de reemplazar 'cliente' y 'productos' con las relaciones adecuadas en tu modelo Compra
    
        return view('admin.procesos.ventas', ['ventas' => $ventas,  'productos' => $productos, 'clientes' => $clientes,]);
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

        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente', // Aquí se cambió 'id' por 'id_cliente'
            'productos' => 'required|array',
            'productos.*' => 'required|exists:productos,id_producto',
            'cantidades' => 'required|array',
            'cantidades.*' => 'required|integer|min:1',
        ]);

        $productos = $request->input('productos');
        $cantidades = $request->input('cantidades');
        $importes = $request->input('importes');


        $venta = new Venta();
        $venta->id_cliente = $request->input('id_cliente');

        $montoTotal=0;
        foreach ($cantidades as $index => $cantidad) {

            foreach ($importes as $index => $importe) {

                 $montoTotal += ($cantidad*$importe);
                 break;

            }

        }

        $venta->monto_total = $montoTotal;

        // dd($compra->monto_total);
        $venta->save();

        foreach ($productos as $index => $productoId) {
            $producto = Producto::find($productoId);
            $precioUnitario = $producto->precio_unitario; // Asegúrate de que estás obteniendo el precio correctamente
            $cantidad = $cantidades[$productoId]; // Asegúrate de que estás obteniendo la cantidad correctamente
        
            $venta->productos()->attach($productoId, [
                'cantidad' => $cantidad,
                'precio_unitario' => $precioUnitario,
            ]);
        }

        return redirect()->route('venta')->with('success', 'Compra realizada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
