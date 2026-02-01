<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;

class PuestosController extends Controller
{
    public function getByMunicipio($mun)
    {
        $puntos = Seller::where('codmun', $mun)
            ->whereNotNull('codcor')
            ->whereNotNull('puesto')
            ->selectRaw('DISTINCT codcor as codpuesto, puesto as nombre')
            ->orderBy('codcor')
            ->get();
    
        return response()->json($puntos);
    }
    
}
