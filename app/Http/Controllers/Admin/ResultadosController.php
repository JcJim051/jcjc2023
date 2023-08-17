<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Resultados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultadosController extends Controller
{  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.resultados.index' );
    }

    public function getResultados() {
        $tm = DB::table('sellers')
                ->count('mesa');
        $tmi= DB::table('sellers')
                ->where('gob1', '<>' , '')
                ->count();

        $tmi2= DB::table('sellers')
                ->where('gob2', '<>' , '')
                ->count();
        $tmi3= DB::table('sellers')
                ->where('gob3', '<>' , '')
                ->count();

        $tv1 = DB::table('sellers')
                ->select("gob1")
                ->sum('gob1');

        $tv2 = DB::table('sellers')
                ->select("gob2")
                ->sum('gob2');
        $tv3 = DB::table('sellers')
                ->select("gob3")
                ->sum('gob3');

        $tr =  DB::table('sellers')
                ->select("recuperados")
                ->sum('recuperados');

        $candidatos = DB::table('sellers')
                ->where('mesa','<>','Rem')
                ->select( DB::raw('sum(Gob1) as Rafaela'), DB::raw('sum(Gob2) as Marcela'), DB::raw('sum(Gob3) as Dario'), DB::raw('sum(Gob4) as Wilmar'), DB::raw('sum(gob5) as libreros'), DB::raw('sum(Gob6) as Barreto'), DB::raw('sum(Gob7) as Bairon'), DB::raw('sum(Gob8) as Antonio'), DB::raw('sum(Gob9) as Florentino'), DB::raw('sum(Gob10) as Eudoro'), DB::raw('sum(Gob11) as Jose'))
                
                ->get();

        $data = DB::table('sellers')
                ->where('codmun','=','001')
                ->where('mesa','<>','Rem')
                ->select('codescru', DB::raw('sum(recuperados) as T'))
                ->groupBy('codescru')
                ->orderBy('codescru', 'asc')
                ->get();
        
        $dt = DB::table('sellers')
                ->where('codmun','=','001')
                ->where('mesa','<>','Rem')
                ->select('codzon', DB::raw('sum(gob1) as T'))
                ->groupBy('codzon')
                ->orderBy('codzon', 'asc')
                ->get();
        // Votos por municipios
        $labelmun =  DB::table('sellers')
        ->select('municipio', DB::raw('sum(gob1) as T'))
        ->where('municipio','<>','VILLAVICENCIO')
        ->groupBy('municipio')
        ->get();

      



        $recl = DB::table('sellers')                
                ->where('reclamacion','=','1')              
                ->sum('reclamacion');

        // dd($datos);

        // return view('admin.resultados.index' , compact('tv1','tv2','tv3', 'tm', 'tmi', 'tmi2','tmi3','tr','data', 'dat', 'd', 'dt', 'recl' ,'lablemun','okmun','nookmun'));
        return response()->json([
                'candidatos'=> $candidatos,
                'tv1' => $tv1,
                'tv2'=> $tv2,
                'tv3'=> $tv3,
                'tm'=> $tm,
                'tmi'=> $tmi,
                'tmi2'=> $tmi2,
                'tmi3'=> $tmi3,
                'tr'=> $tr,
                'data'=> $data,
                
                'dt'=> $dt,
                'recl'=> $recl,
                'labelmun'=> $labelmun,
                
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
     * @param  \App\Models\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function show(Resultados $resultados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultados $resultados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resultados $resultados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultados $resultados)
    {
        //
    }
}
