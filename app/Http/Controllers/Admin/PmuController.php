<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PmuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
        $role = auth()->user()->role;
        $codigo_zona = auth()->user()->codzon;
        $codigo_crisis = auth()->user()->codzon;
        $ruta = auth()->user()->codzon;
        $coordinador = auth()->user()->codpuesto;
        $municipio = auth()->user()->mun;

        $pmu = Seller::where('mesa', '<>', 'Rem')
            ->leftJoin('puestos', 'sellers.codcor', '=', 'puestos.codpuesto')
            ->when($role == 1, function ($query) use ($municipio) {
                if ($municipio == 1) {
                    return $query->where('sellers.codmun', 1);
                } else {
                    if ($municipio == 0) {
                        return $query->where('sellers.codmun', '<>', 1)->where('sellers.cod_ruta', $ruta);
                    } else {
                        return $query;
                    }
                }
            })
            ->when($role == 2, function ($query) use ($codigo_zona) {
                return $query->where('sellers.codescru', $codigo_zona);
            })
            ->when($role == 7, function ($query) use ($codigo_crisis, $municipio) {
                if ($municipio == 999) {
                    return $query; // No se aplican restricciones adicionales para estos roles
                } else {
                    return $query->where('sellers.codmesa_crisis', $codigo_crisis); // No se aplican restricciones adicionales para estos roles
                }
                
                
            })
            ->when($role == 4 || $role == 5 , function ($query) {
                return $query; // No se aplican restricciones adicionales para estos roles
            })
            ->get(['sellers.*', 'puestos.telefono']);
            
        return view('admin.pmu.index', compact('pmu'));

}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $pmu)
    {
        $cordinador = DB::table('puestos')
                            ->where('codpuesto', '=' , $pmu->codcor)
                            ->get();
        //dd($pmu);
        return view('admin.pmu.edit', compact('pmu', 'cordinador'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
