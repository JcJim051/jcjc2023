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
            // Total testigos posesionados en villao
            $ttpv = DB::table('sellers')
                    
                    ->where('mesa', '<>' , 'Rem')
                    ->where('statusasistencia', '=' , '1')
                    ->count();
            // Total testigos en villao
            $ttv = DB::table('sellers')
                    
                    ->where('mesa', '<>' , 'Rem')
                    ->count();
            // Total remanenets posesionados en villao
            $trpv = DB::table('sellers')
                    
                    ->where('mesa', '=' , 'Rem')
                    ->where('statusasistencia', '=' , '1')
                    ->count();    
                     
            // Total testigos en municipios
                    
            $ttm = DB::table('sellers')
                    ->where('codmun','<>','001')
                    ->where('mesa', '<>' , 'Rem')
                    ->count();    
            
                $asistenciam = DB::table('sellers')
                    ->select('municipio', 'puesto')
                    ->addSelect(DB::raw('COUNT(*) as total_testigo'))
                    ->addSelect(DB::raw('SUM(CASE WHEN statusasistencia = 1 THEN 1 ELSE 0 END) as testigo_ok'))
                    ->where('mesa', '<>', 'Rem') // Excluir registros donde mesa sea igual a "Rem"
                    ->groupBy('municipio', 'puesto')
                    ->get();
        
         //dd($asistenciam); 
 
         return view('admin.asistencia.index', compact('ttpv','ttv','trpv','asistenciam'));
        
         
        }
    public function getAsistencia()
    {
        
                // Total testigos posesionados en villao
                        $ttpv = DB::table('sellers')
                                ->where('codmun','=','001')
                                ->where('mesa', '<>' , 'Rem')
                                ->where('statusasistencia', '=' , '1')
                                ->count();
                // Total testigos en villao
                        $ttv = DB::table('sellers')
                                ->where('codmun','=','008')
                                ->where('mesa', '<>' , 'Rem')
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
                ->where('mesa','<>','Rem')
                ->select('puesto', 
                         DB::raw('SUM(CASE WHEN statusasistencia = 1 THEN 1 ELSE 0 END) as T'),
                         DB::raw('SUM(CASE WHEN statusasistencia = 0 THEN 1 ELSE 0 END) as F'))
                ->groupBy('puesto')
                ->get();
            

                        // testigos y remanentes presentes por municipio
                       
                        
        


       

        //dd($dt);

        // return view('admin.asistencia.index' , compact( 'ttpv', 'trpv', 'ttpm', 'trpm',  'd','ndt', 'dt', 'lablemun','okmun', 'nookmun'));
        return response()->json([
                'dt'=> $dt,
                
                'ttpv'=> $ttpv,
                'trpv'=> $trpv,
                'ttpm'=> $ttpm,
                'trpm'=> $trpm,
                'ttv'=> $ttv,
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
