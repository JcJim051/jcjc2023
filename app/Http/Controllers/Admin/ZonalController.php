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
        $role = auth()->user()->role;
        $escrutador = auth()->user()->codzon;
        $coordinador = auth()->user()->codpuesto;
        $municipio = auth()->user()->mun;

      
        
       


        $resultados = Seller::pluck('gob1')->toArray();

        // Calcular la desviación estándar
        $desviacion_estandar = DB::table('sellers')->whereNotNull('gob1')->select(DB::raw('STDDEV(gob1) as desviacion_estandar'))->value('desviacion_estandar');
                



      



                if ($role == 1) {
                    // 1 = villao
                    if ($municipio == 1) {
                        $zonal = Seller::where('mesa', '<>', 'Rem')->where('codmun' , 001)->get();
                       
                    } else {
                        // 0 = municipios
                        if ($municipio == 0) {
                            $zonal = Seller::where('mesa', '<>', 'Rem')->where('codmun' ,  '<>', 001)->get();
                        } else {
                            $zonal = Seller::where('mesa', '<>', 'Rem')->get();
                        }
                    }
                } else {
                    if ($role == 2) {
                        
                        $zonal = Seller::where('mesa', '<>', 'Rem')->where('codescru' , $escrutador)->get();
                    } else {

                        if ($role == 4 or $role == 5) {
                            $zonal = Seller::where('mesa', '<>', 'Rem')->get();
                        } else {
                               
                             }


                    }
                 }

        return view('admin.zonal.index', compact('zonal'));
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
