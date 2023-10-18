<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resultados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Seller;

class AfluenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {      $primera = DB::table('sellers as s1')
                    ->join(DB::raw('(SELECT Codcor, AVG(reporte_1) as promedio FROM sellers GROUP BY Codcor) as s2'), function ($join) {
                        $join->on('s1.Codcor', '=', 's2.Codcor');
                    })
                    ->select('s1.Municipio', 's1.Puesto', 's1.reporte_1 as Reporte', DB::raw('s2.promedio as Promedio'))
                    ->whereRaw('s1.reporte_1 > s2.promedio * 1.3')
                    ->get()
                    ->toArray();
            $segundo = DB::table('sellers as s1')
                    ->join(DB::raw('(SELECT Codcor, AVG(reporte_2) as promedio FROM sellers GROUP BY Codcor) as s2'), function ($join) {
                        $join->on('s1.Codcor', '=', 's2.Codcor');
                    })
                    ->select('s1.Municipio', 's1.Puesto', 's1.reporte_2 as Reporte', DB::raw('s2.promedio as Promedio'))
                    ->whereRaw('s1.reporte_2 > s2.promedio * 1.3')
                    ->get()
                    ->toArray();
            $tercero = DB::table('sellers as s1')
                    ->join(DB::raw('(SELECT Codcor, AVG(reporte_3) as promedio FROM sellers GROUP BY Codcor) as s2'), function ($join) {
                        $join->on('s1.Codcor', '=', 's2.Codcor');
                    })
                    ->select('s1.Municipio', 's1.Puesto', 's1.reporte_3 as Reporte', DB::raw('s2.promedio as Promedio'))
                    ->whereRaw('s1.reporte_3 > s2.promedio * 1.3')
                    ->get()
                    ->toArray();
                
            
            //dd($promedio);
   
            return view('admin.afluencia.index', compact('primera', 'segundo','tercero'));

    }
    public function getAfluencia()
    {
            $tm = DB::table('sellers')
                     ->where('mesa', '<>' , 'Rem')
                     ->count('mesa');
            $tmi_1= DB::table('sellers')
                    ->where('reporte_1', '<>' , '')
                    ->count();
            $tmi_2= DB::table('sellers')
                    ->where('reporte_2', '<>' , '')
                    ->count();
            $tmi_3= DB::table('sellers')
                    ->where('reporte_2', '<>' , '')
                    ->count();

           
            $tv1 = DB::table('sellers')
                    ->select("reporte_1")
                    ->sum('reporte_1');

            $tv2 = DB::table('sellers')
                    ->select("reporte_2")
                    ->sum('reporte_2');
            $tv3 = DB::table('sellers')
                    ->select("reporte_3")
                    ->sum('reporte_3');

           

            $tr=1;

           
                $dt =  DB::table('sellers')
                        
                        ->where('mesa','<>','Rem')
                        ->select('puesto', DB::raw('sum(reporte_1) as T'),DB::raw('sum(reporte_2) as F'),DB::raw('sum(reporte_3) as W'))
                        ->groupBy('puesto')
                      
                        ->get();

               




            // Votantes por municipios


            $labelmun =  DB::table('sellers')
                        ->select('municipio', DB::raw('sum(reporte_1) as T'),DB::raw('sum(reporte_2) as F'), DB::raw('sum(reporte_3) as W'))
                        ->where('municipio','<>','VILLAVICENCIO')
                        ->groupBy('municipio')
                        ->get();

            // dd($datos);
            return response()->json([
                'dt'=> $dt,
                'labelmun' => $labelmun,
                'tm' => $tm,
                'tmi_1' => $tmi_1,
                'tmi_2' => $tmi_2,
                'tmi_3' => $tmi_3,
                'tv1' => $tv1,
                'tv2' => $tv2,
                'tv3' => $tv3,
        ]);
        
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
    public function edit($id)
    {
        //
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
