<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resultados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AfluenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $tm = DB::table('sellers')
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

            $data = DB::table('sellers')
                    ->where('codmun','=','001')
                    ->where('mesa','<>','Rem')
                    ->select('codzon', DB::raw('sum(reporte_1) as T'))
                    ->groupBy('codzon')
                    ->orderBy('codzon', 'asc')
                    ->get();
            $dat =  DB::table('sellers')
                    ->where('codmun','=','001')
                    ->where('mesa','<>','Rem')
                    ->select('codzon', DB::raw('sum(reporte_1) as T'))
                    ->groupBy('codzon')
                    ->orderBy('codzon', 'asc')
                    ->get();

                $d = DB::table('sellers')
                        ->where('codmun','=','001')
                        ->where('mesa','<>','Rem')
                        ->select('codzon', DB::raw('sum(reporte_1) as T'))
                        ->groupBy('codzon')
                        ->orderBy('codzon', 'asc')
                        ->get();
                $dt =  DB::table('sellers')
                        ->where('codmun','=','001')
                        ->where('mesa','<>','Rem')
                        ->select('codzon', DB::raw('sum(reporte_1) as T'))
                        ->groupBy('codzon')
                        ->orderBy('codzon', 'asc')
                        ->get();

                $d2 = DB::table('sellers')
                        ->where('codmun','=','001')
                        ->where('mesa','<>','Rem')
                        ->select('codzon', DB::raw('sum(reporte_2) as T'))
                        ->groupBy('codzon')
                        ->orderBy('codzon', 'asc')
                        ->get();
                $dt2 =  DB::table('sellers')
                        ->where('codmun','=','001')
                        ->where('mesa','<>','Rem')
                        ->select('codzon', DB::raw('sum(reporte_3) as T'))
                        ->groupBy('codzon')
                        ->orderBy('codzon', 'asc')
                        ->get();
                $d3 = DB::table('sellers')
                        ->where('codmun','=','001')
                        ->where('mesa','<>','Rem')
                        ->select('codzon', DB::raw('sum(reporte_3) as T'))
                        ->groupBy('codzon')
                        ->orderBy('codzon', 'asc')
                        ->get();
                        
                        
                $dt3 =  DB::table('sellers')
                        ->where('codmun','=','001')
                        ->where('mesa','<>','Rem')
                        ->select('codzon', DB::raw('sum(reporte_2) as T'))
                        ->groupBy('codzon')
                        ->orderBy('codzon', 'asc')
                        ->get();




            // Votantes por municipios


            $lablemun =  DB::table('sellers')
                        ->select('municipio', DB::raw('sum(reporte_1) as T'))
                        ->where('municipio','<>','VILLAVICENCIO')
                        ->groupBy('municipio')
                        ->get();

            $okmun =  DB::table('sellers')
                        ->select('municipio', DB::raw('sum(reporte_1) as T'))
                        ->where('municipio','<>','VILLAVICENCIO')
                        ->groupBy('municipio')
                        ->get();

            $lablemun2 =  DB::table('sellers')
                        ->where('mesa','<>','Rem')
                        ->select('municipio', DB::raw('sum(reporte_2) as T'))
                        ->where('municipio','<>','VILLAVICENCIO')
                        ->groupBy('municipio')
                        ->get();

            $okmun2 =  DB::table('sellers')
                        ->where('mesa','<>','Rem')
                        ->select('municipio', DB::raw('sum(reporte_2) as T'))
                        ->where('municipio','<>','VILLAVICENCIO')
                        ->groupBy('municipio')
                        ->get();

            $lablemun3 =  DB::table('sellers')
                        ->where('mesa','<>','Rem')
                        ->select('municipio', DB::raw('sum(reporte_3) as T'))
                        ->where('municipio','<>','VILLAVICENCIO')
                        ->groupBy('municipio')
                        ->get();


            $okmun3 =  DB::table('sellers')
                        ->where('mesa','<>','Rem')
                        ->select('municipio', DB::raw('sum(reporte_3) as T'))
                        ->where('municipio','<>','VILLAVICENCIO')
                        ->groupBy('municipio')
                        ->get();




            

            // dd($datos);

            return view('admin.afluencia.index' , compact('tv1','tv2','tv3', 'tm', 'tmi_1', 'tmi_2','tmi_3','data', 'dat', 'd', 'dt', 'd2', 'dt2', 'd3', 'dt3' ,'lablemun','okmun','lablemun2','okmun2','lablemun3','okmun3'));

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
