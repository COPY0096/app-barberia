<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suplidor; 

class SuplidorController extends Controller
{
    public function index()
    {
        $suplidores = Suplidor::all();
        return view('suplidores.index', compact('suplidores'));
    }

    public function create()
    {
        return view('suplidores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'paginaweb' => 'required',
        ]);

        Suplidor::create($request->all());

        return redirect()->route('suplidores.index')->with('success', 'Suplidor creado exitosamente.');
    }
}
