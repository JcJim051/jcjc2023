<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resultados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         
 
         return view('admin.asistencia.index');
        
         
        }
    public function getAsistencia()
    {
        
                // Total testigos posesionados en villao
                        $ttpv = DB::table('sellers')
                                ->where('codmun','=','001')
                                ->where('mesa', '<>' , 'Rem')
                                ->where('statusasistencia', '=' , '1')
                                ->count();
                // Total remanenets posesionados en villao
                        $trpv = DB::table('sellers')
                                ->where('codmun','=','001')
                                ->where('mesa', '=' , 'Rem')
                                ->where('statusasistencia', '=' , '1')
                                ->count();    
                // Total testigos posesionados en municipios
                        $ttpm = DB::table('sellers')
                                ->where('codmun','<>','001')
                                ->where('mesa', '<>' , 'Rem')
                                ->where('statusasistencia', '=' , '1')
                                ->count();    
                                        
                // Total remanentes posesionados en municipios
                        $trpm = DB::table('sellers')
                                ->where('codmun','<>','001')
                                ->where('mesa', '=' , 'Rem')
                                ->where('statusasistencia', '=' , '1')
                                ->count();            

                //       testigos y remanentes presentes por comision 

                
                        $dt = DB::table('sellers')
                                ->where('codmun','=','001')                   
                                ->select('codzon', DB::raw('sum(statusasistencia) as T'), DB::raw('count(*) - sum(statusasistencia) as F'))
                                ->groupBy('codzon')
                                ->orderBy('codzon', 'asc')
                                ->get();

                        // testigos y remanentes presentes por municipio
                        $lablemun =  DB::table('sellers')
                                
                                ->select('municipio', DB::raw('count(statusasistencia) as T'))
                                ->where('municipio','<>','VILLAVICENCIO')
                                ->groupBy('municipio')
                                ->get();

                        
        


       

        //dd($dt);

        // return view('admin.asistencia.index' , compact( 'ttpv', 'trpv', 'ttpm', 'trpm',  'd','ndt', 'dt', 'lablemun','okmun', 'nookmun'));
        return response()->json([
                'dt'=> $dt,
                'lablemun' => $lablemun,
                'ttpv'=> $ttpv,
                'trpv'=> $trpv,
                'ttpm'=> $ttpm,
                'trpm'=> $trpm,
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
