<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function areaChart()
    {
        // Aquí puedes agregar la lógica para obtener los datos del gráfico
        $labels = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'];
        $data = [20, 45, 30, 70, 50];

        return view('area-chart', compact('labels', 'data'));
    }
}
