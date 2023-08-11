<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ZonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $zonal = Seller::where('mesa', '<>', 'Rem')->get();
        
        $tmi= DB::table('sellers')
                ->where('gob1', '<>' , 'null')
                ->count();

        $tv1 = DB::table('sellers')
                ->select("gob1")
                ->sum('gob1');


                $resultados = Seller::pluck('gob1')->toArray();

                // Calcular la desviación estándar
                $desviacion_estandar = DB::table('sellers')->whereNotNull('gob1')->select(DB::raw('STDDEV(gob1) as desviacion_estandar'))->value('desviacion_estandar');
                

        return view('admin.zonal.index', compact('zonal','tmi' ,'tv1', 'desviacion_estandar'));
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
    public function edit(Seller $zonal)
    {
        $cordinador = DB::table('puestos')
                            ->where('codpuesto', '=' , $zonal->codcor)
                            ->get();
        // dd($cordinador);
        return view('admin.zonal.edit', compact('zonal', 'cordinador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $zonal)
    {



        $zonal->update($request->all());


        return redirect()->route('admin.tellers.index', $zonal)->with('info', 'Reporte de votos se actualizó con Éxito');
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
