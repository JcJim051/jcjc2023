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
        $tm = DB::table('sellers')
                ->count('mesa');
        $tmi= DB::table('sellers')
                ->where('alc1', '<>' , '')
                ->count();

        $tmi2= DB::table('sellers')
                ->where('alc2', '<>' , '')
                ->count();
        $tmi3= DB::table('sellers')
                ->where('alc3', '<>' , '')
                ->count();

        $tv1 = DB::table('sellers')
                ->select("alc1")
                ->sum('alc1');

        $tv2 = DB::table('sellers')
                ->select("alc2")
                ->sum('alc2');
        $tv3 = DB::table('sellers')
                ->select("alc3")
                ->sum('alc3');

        $tr =  DB::table('sellers')
                ->select("recuperados")
                ->sum('recuperados');



        $data =  DB::table('sellers')
                ->select('codescru', DB::raw('sum(recuperados) as T'))
                ->groupBy('codescru')
                ->get();
        $dat =  DB::table('sellers')
            ->select('codescru', DB::raw('sum(recuperados) as T'))
            ->groupBy('codescru')
            ->get();

        //dd($dat);

        return view('admin.resultados.index' , compact('tv1','tv2','tv3', 'tm', 'tmi', 'tmi2','tmi3','tr','data', 'dat'));
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
