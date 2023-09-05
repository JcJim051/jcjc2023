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
        $ruta = auth()->user()->codzon;
        $coordinador = auth()->user()->codpuesto;
        $municipio = auth()->user()->mun;
        

                if ($role == 1) {
                    // 1 = villao
                    if ($municipio == 1) {
                        $pmu = Seller::where('mesa', '<>', 'Rem')->where('codmun' , 001)->get();
                       
                    } else {
                        // 0 = municipios
                        if ($municipio == 0) {
                            $pmu = Seller::where('mesa', '<>', 'Rem')->where('codmun' ,  '<>', 001)->where('cod_ruta' , $ruta)->get();
                        } else {
                            $pmu = Seller::where('mesa', '<>', 'Rem')->get();
                        }
                    }
                } else {
                    if ($role == 2) {
                        
                        $pmu = Seller::where('mesa', '<>', 'Rem')->where('codescru' , $codigo_zona)->get();
                    } else {

                        if ($role == 4 or $role == 5) {
                            $pmu = Seller::where('mesa', '<>', 'Rem')->get();
                        } else {
                            if ($role == 7) {
                                $pmu = Seller::where('mesa', '<>', 'Rem')->where('codmesa_crisis' , $codigo_zona)->get();
                            } else {
                                   
                                 }   

                             }


                    }
                 }

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
        // dd($cordinador);
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
