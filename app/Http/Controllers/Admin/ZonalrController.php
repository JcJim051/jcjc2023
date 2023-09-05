<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Votos;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ZonalrController extends Controller
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
        $ruta = auth()->user()->codzon;
        $coordinador = auth()->user()->codpuesto;
        $municipio = auth()->user()->mun;

        $data = Seller::all();
        $tmi= DB::table('votos')
                ->where('gob1_zonal', '<>' , 'null')
                ->count();

        $tv1 = DB::table('votos')
                ->select("gob1_zonal")
                ->sum('gob1_zonal');


        $resultados = votos::pluck('gob1_zonal')->toArray();

        // Calcular la desviación estándar
        $desviacion_estandar = DB::table('votos')->whereNotNull('gob1_zonal')->select(DB::raw('STDDEV(gob1_zonal) as desviacion_estandar'))->value('desviacion_estandar');
    
        if ($role == 1) {
            // 1 = villao
            if ($municipio == 1) {
                $data = Seller::where('mesa', '<>', 'Rem')->where('codmun' , 001)->get();
               
            } else {
                // 0 = municipios
                if ($municipio == 0) {
                    $data = Seller::where('mesa', '<>', 'Rem')->where('codmun' ,  '<>', 001)->where('cod_ruta' , $ruta)->get();
                } else {
                    $data = Seller::where('mesa', '<>', 'Rem')->get();
                }
            }
        } else {
            if ($role == 2) {
                
                $data = Seller::where('mesa', '<>', 'Rem')->where('codescru' , $escrutador)->get();
            } else {

                if ($role == 4 or $role == 5) {
                    $data = Seller::where('mesa', '<>', 'Rem')->get();
                } else {
                       
                     }


            }
         }


        return view('admin.zonalr.index', compact('data','tmi' ,'tv1', 'desviacion_estandar'));
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
    public function edit(votos $zonalr)
    {
        $data = Seller::all();
        $zonal = $zonalr;
        return view('admin.zonalr.edit', compact('zonal', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, votos $zonal)
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
