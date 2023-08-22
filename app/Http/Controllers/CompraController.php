<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Cliente;
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

        $arrayDetalleCompra = Compra::with('comprasProductos.producto')->get();


        $compras = Compra::with('cliente', 'productos')->orderBy('created_at', 'desc')->paginate(10);
        $productos = Producto::all(); // Obtener todos los productos
        $this->productosList = Producto::all(); // Obtener todos los productos
        $clientes = Cliente::all();
        // Asegúrate de reemplazar 'cliente' y 'productos' con las relaciones adecuadas en tu modelo Compra
    
        return view('admin.procesos.compras', [
            'compras' => $compras,
            'productos' => $productos,
            'clientes' => $clientes,
            'productosSeleccionados' => [], // Inicializa la variable aquí para evitar errores
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'productos' => 'required|array',
            'productos.*' => 'required|exists:productos,id_producto',
            'cantidades' => 'required|array',
            'cantidades.*' => 'required|integer|min:1',
            'importes' => 'required|array',
            'importes.*' => 'required|numeric|min:0.01',
        ]);
    
        $productos = $request->input('productos');
        $cantidades = $request->input('cantidades');
        $importes = $request->input('importes');
    
        $compra = new Compra();
        $compra->id_cliente = $request->input('id_cliente');
    
        // Establece el monto total antes de guardar la compra
        $montoTotal = 0;
        foreach ($productos as $productoId) {
            if (isset($cantidades[$productoId]) && isset($importes[$productoId])) {
                $producto = Producto::find($productoId);
                $precioUnitario = $producto->precio_unitario;
                $cantidad = $cantidades[$productoId];
                $montoTotal += ($cantidad * $importes[$productoId]);



            }
        }
    
        $compra = new Compra();
        $compra->id_cliente = $request->input('id_cliente');
        $compra->monto_total = $montoTotal; // Agrega el monto total
        $compra->save(); // Guarda la compra para obtener un ID válido
    
        $compraId = $compra->id_compra;
    
        // Crea un arreglo para almacenar los detalles de los productos seleccionados
        $productosSeleccionados = [];
        foreach ($productos as $productoId) {
            if (in_array($productoId, $request->input('productos'))) {
                if (isset($cantidades[$productoId]) && isset($importes[$productoId])) {
                    $producto = Producto::find($productoId);
                    $productosSeleccionados[$productoId] = [
                        'precio_unitario' => $producto->precio_unitario,
                        'cantidad' => $cantidades[$productoId],
                    ];

                    $compra->productos()->attach($productoId, [
                        'id_compra' => $compraId,
                        'cantidad' => $cantidades[$productoId],
                        'precio_unitario' => $producto->precio_unitario,
                    ]);

                }
            }
        }
    
        $compras = Compra::with('cliente', 'productos')->orderBy('created_at', 'desc')->paginate(10);
        $productosList = Producto::all();
        $clientes = Cliente::all();
    
        return view('admin.procesos.compras', [
            'compras' => $compras,
            'productos' => $productosList,
            'clientes' => $clientes,
            'productosSeleccionados' => $productosSeleccionados,
        ])->with('success', 'Compra realizada exitosamente.');
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
