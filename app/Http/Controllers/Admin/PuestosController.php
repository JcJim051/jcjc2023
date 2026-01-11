<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Puestos;

class PuestosController extends Controller
{
    public function getByMunicipio($mun)
    {
        $puntos = Puestos::where('mun', $mun)
            ->select('codpuesto', 'nombre')
            ->orderBy('codpuesto')
            ->get();

        return response()->json($puntos);
    }
}
