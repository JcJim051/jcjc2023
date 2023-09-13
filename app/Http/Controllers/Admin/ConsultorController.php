<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultorController extends Controller
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
        $mun = auth()->user()->mun;

         $okd = DB::table('sellers')
                ->select("status")
                ->whereStatus("1")
                ->where('mesa','<>','Rem')
                ->count();

         
         $nookd = DB::table('sellers')
                     ->select("status")
                     ->whereStatus("0")
                     ->where('mesa','<>','Rem')
                     ->count();
         $remokd =DB::table('sellers')
                     ->where('mesa','=','Rem')
                     ->whereStatus("1")  
                     ->count(); 
         $remnookd =DB::table('sellers')
                     ->where('mesa','=','Rem')
                     ->whereStatus("0")  
                     ->count(); 
         // fin Departamental
         $okv = DB::table('sellers')
                     ->select("codmun")
                     ->whereCodmun("001")
                     ->whereStatus("1")
                     ->where('mesa','<>','Rem')
                     ->count();
         $nookv = DB::table('sellers')
                     ->select("status")
                     ->where('Codmun','=','001')
                     ->whereStatus("0")
                     ->where('mesa','<>','Rem')
                     ->count();
                     
         $remokv = DB::table('sellers')
                     ->select("codmun")
                     ->whereCodmun("001")
                     ->whereStatus("1")
                     ->where('mesa','=','Rem')
                     ->count();
         $remnookv = DB::table('sellers')
                     ->select("status")
                     ->where('Codmun','=','001')
                     ->whereStatus("0")
                     ->where('mesa','=','Rem')
                     ->count();
         // Fin villavicencio
         $okm = DB::table('sellers')
                     ->select("codmun")
                     ->where('Codmun','<>','001')
                     ->whereStatus("1")
                     ->where('mesa','<>','Rem')
                     ->count();
         $nookm = DB::table('sellers')
                     ->select("status")
                     ->where('Codmun','<>','001')
                     ->whereStatus("0")
                     ->where('mesa','<>','Rem')
                     ->count();
         $remokm = DB::table('sellers')
                     ->select("codmun")
                     ->where('Codmun','<>','001')
                     ->whereStatus("1")
                     ->where('mesa','=','Rem')
                     ->count();
         $remnookm = DB::table('sellers')
                     ->select("status")
                     ->where('Codmun','<>','001')
                     ->whereStatus("0")
                     ->where('mesa','=','Rem')
                     ->count();
         // Fin Municipios
         // // status ok
         // $sok = 1;
         // // Status nook
         // $snook = 0;
         $data =  DB::table('sellers')
             ->where('codmun','=','001')
             ->where('mesa','<>','Rem')
             ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
             ->groupBy('codescru')
             ->orderBy('codescru', 'asc')
             ->get();

                 
         $dat =  DB::table('sellers')
             ->where('codmun','=','001')
             ->where('mesa','<>','Rem')
             ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
             ->groupBy('codescru')
             ->orderBy('codescru', 'asc')
             ->get();

         $not =  DB::table('sellers')
             ->where('codmun','=','001')
             ->where('mesa','<>','Rem')
             ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
             ->groupBy('codescru')
             ->orderBy('codescru', 'asc')
             ->get();
         $lablemun =  DB::table('sellers')
             ->select('municipio', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
             ->where('municipio','<>','VILLAVICENCIO')
             ->groupBy('municipio')
             ->get();
         $okmun =  DB::table('sellers')
             ->where('mesa','<>','Rem')
             ->select('municipio', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
             ->where('municipio','<>','VILLAVICENCIO')
             ->groupBy('municipio')
             ->get();
         $nookmun =  DB::table('sellers')
             ->where('mesa','<>','Rem')
             ->select('municipio', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
             ->where('municipio','<>','VILLAVICENCIO')
             ->groupBy('municipio')
             ->get();


         $okaniv =  DB::table('sellers')
                     ->where('codmun', '=' ,'001')
                     ->whereStatusani("1")
                     ->count();
         $nookaniv =  DB::table('sellers')
                     ->where('codmun', '=' ,'001')
                     ->whereStatusani("0")
                     ->count();
         $okanim =  DB::table('sellers')
                     ->where('codmun', '<>' ,'001')
                     ->whereStatusani("1")
                     ->count();
         $nookanim =  DB::table('sellers')
                     ->where('codmun', '<>' ,'001')
                     ->whereStatusani("0")
                     ->count();

         // calcular numero de puestos 
         $puestosd = DB::table('puestos')
                     ->where('mun','<>','3')
                     ->count();
         $puestosv = DB::table('puestos')
                     ->where('mun','=','1')
                     ->count();
         $puestosm = DB::table('puestos')
                     ->where('mun','=','0')
                     ->count();
                     
        if ($role == 1) {
            if ($mun == 1) {
                $mesasok = DB::table('sellers')
                    ->select('codcor', 'municipio', 'puesto', 
                        DB::raw('COUNT(*) as mesas'), 
                        DB::raw('SUM(status = 1) as mesas_ok'), 
                        DB::raw('SUM(mesa = "Rem") as rem'),
                        DB::raw('SUM(mesa = "Rem" AND status = 1) as rem_ok'))
                    ->where('mesa', '<>', 'Rem') 
                    ->where('codmun', '=', '001') 
                    ->groupBy('codcor', 'municipio', 'puesto')
                    ->orderBy('codcor')
                    ->get();
            } else {
                if ($mun == 0) {
                    $mesasok = DB::table('sellers')
                             ->select('codcor', 'municipio', 'puesto', 
                                 DB::raw('COUNT(*) as mesas'), 
                                 DB::raw('SUM(status = 1) as mesas_ok'), 
                                 DB::raw('SUM(mesa = "Rem") as rem'),
                                 DB::raw('SUM(mesa = "Rem" AND status = 1) as rem_ok'))
                             ->where('mesa', '<>', 'Rem')
                             ->where('cod_ruta' , $ruta)
                             ->groupBy('codcor', 'municipio', 'puesto')
                             ->orderBy('codcor')
                             ->get();
                } else {
                    $mesasok = DB::table('sellers')
                             ->select('codcor', 'municipio', 'puesto', 
                                 DB::raw('COUNT(*) as mesas'), 
                                 DB::raw('SUM(status = 1) as mesas_ok'), 
                                 DB::raw('SUM(mesa = "Rem") as rem'),
                                 DB::raw('SUM(mesa = "Rem" AND status = 1) as rem_ok'))
                             ->where('mesa', '<>', 'Rem')
                             ->groupBy('codcor', 'municipio', 'puesto')
                             ->orderBy('codcor')
                             ->get();
                }
            }
        } else {
            if ($role == 4) {
                $mesasok = DB::table('sellers')
                             ->select('codcor', 'municipio', 'puesto', 
                                 DB::raw('COUNT(*) as mesas'), 
                                 DB::raw('SUM(status = 1) as mesas_ok'), 
                                 DB::raw('SUM(mesa = "Rem") as rem'),
                                 DB::raw('SUM(mesa = "Rem" AND status = 1) as rem_ok'))
                             ->where('mesa', '<>', 'Rem')
                             ->groupBy('codcor', 'municipio', 'puesto')
                             ->orderBy('codcor')
                             ->get();
            } else {
                $mesasok = null;
            }
            
        }
                     

        
                 
                     
       
                     
        return view('admin.consultors.index', compact('data', 'dat', 'not', 'lablemun', 'okmun', 'nookmun', 'okaniv','nookaniv', 'okanim','nookanim','remokd','remnookd','remokv','remnookv','remokm','remnookm', 'puestosd', 'puestosv' , 'puestosm', 'mesasok'))
                 ->with('okd', $okd)
                 ->with('nookd', $nookd)
                 ->with('nookv', $nookv)
                 ->with('okv', $okv)
                 ->with('nookm', $nookm)
                 ->with('okm', $okm)
                 ->with('data', $data);

     }

public function getData()
{


    $okd = DB::table('sellers')
                    ->select("status")
                    ->whereStatus("1")
                    ->where('mesa','<>','Rem')
                    ->count();

    
                    

    $nookd = DB::table('sellers')
                    ->select("status")
                    ->whereStatus("0")
                    ->where('mesa','<>','Rem')
                    ->count();

    $remokd =DB::table('sellers')
                    ->where('mesa','=','Rem')
                    ->whereStatus("1")  
                    ->count(); 

    $remnookd =DB::table('sellers')
                    ->where('mesa','=','Rem')
                    ->whereStatus("0")  
                    ->count(); 

        // fin Departamental
    $okv = DB::table('sellers')
                    ->select("codmun")
                    ->whereCodmun("001")
                    ->whereStatus("1")
                    ->where('mesa','<>','Rem')
                    ->count();


    $nookv = DB::table('sellers')
                    ->select("status")
                    ->where('Codmun','=','001')
                    ->whereStatus("0")
                    ->where('mesa','<>','Rem')
                    ->count();
                    
    $remokv = DB::table('sellers')
                    ->select("codmun")
                    ->whereCodmun("001")
                    ->whereStatus("1")
                    ->where('mesa','=','Rem')
                    ->count();


    $remnookv = DB::table('sellers')
                    ->select("status")
                    ->where('Codmun','=','001')
                    ->whereStatus("0")
                    ->where('mesa','=','Rem')
                    ->count();

        // Fin villavicencio

    $okm = DB::table('sellers')
                    ->select("codmun")
                    ->where('Codmun','<>','001')
                    ->whereStatus("1")
                    ->where('mesa','<>','Rem')
                    ->count();


    $nookm = DB::table('sellers')
                    ->select("status")
                    ->where('Codmun','<>','001')
                    ->whereStatus("0")
                    ->where('mesa','<>','Rem')
                    ->count();
    $remokm = DB::table('sellers')
                    ->select("codmun")
                    ->where('Codmun','<>','001')
                    ->whereStatus("1")
                    ->where('mesa','=','Rem')
                    ->count();


    $remnookm = DB::table('sellers')
                    ->select("status")
                    ->where('Codmun','<>','001')
                    ->whereStatus("0")
                    ->where('mesa','=','Rem')
                    ->count();

    

   
  
                
    $dat =  DB::table('sellers')
            ->where('codmun','=','001')
            ->where('mesa','<>','Rem')
            ->select('codzon', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
            ->groupBy('codzon')
            ->orderBy('codzon', 'asc')
            ->get();

            $ruta = auth()->user()->codzon;
            $mun = auth()->user()->mun;



            $lablemun =  DB::table('sellers')
            ->select('municipio', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
            ->where('municipio','<>','VILLAVICENCIO')
            ->groupBy('municipio')
            ->get();
            
            
         
    
    

   


    $okaniv =  DB::table('sellers')
                    ->where('codmun', '=' ,'001')
                    ->whereStatusani("1")
                    ->count();

    $nookaniv =  DB::table('sellers')
                    ->where('codmun', '=' ,'001')
                    ->whereStatusani("0")
                    ->count();


    $okanim =  DB::table('sellers')
                    ->where('codmun', '<>' ,'001')
                    ->whereStatusani("1")
                    ->count();

    $nookanim =  DB::table('sellers')
                    ->where('codmun', '<>' ,'001')
                    ->whereStatusani("0")
                    ->count();

    // calcular numero de puestos 
    $puestosd = DB::table('puestos')
                    ->where('mun','<>','3')
                    ->count();
    $puestosv = DB::table('puestos')
                    ->where('mun','=','1')
                    ->count();
    $puestosm = DB::table('puestos')
                    ->where('mun','=','0')
                    ->count();
                    
  


    return response()->json([
            'dat'=> $dat,
           
            'lablemun' =>$lablemun ,
            
            'okaniv'=>$okaniv,
            'nookaniv'=>$nookanim,
            'okanim'=>$okanim,
            'nookanim'=>$nookanim,
            'remokd'=>$remokd,
            'remnookd'=>$remnookd,
            'remokv'=>$remokv,
            'remnookv'=>$remnookv,
            'remokm'=>$remokm,
            'remnookm'=>$remnookm,
            'puestosd'=>$puestosd,
            'puestosv' =>$puestosv,                  
            'puestosm'=>$puestosm,
            'okd' => $okd,
            'nookd' => $nookd,
            'nookv' => $nookv,
            'okv' => $okv,
            'nookm' => $nookm,
            'okm' => $okm,
            
            
        ]);
       
                                                
}

}
