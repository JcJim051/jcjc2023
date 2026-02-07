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
         $puestosd =  DB::table('sellers')
                   
                    ->distinct('codcor')
                    ->count('puesto');
         $puestosv = DB::table('sellers')
                    ->where('codmun', '001')
                    ->distinct('codcor')
                    ->count('puesto');

         $puestosm = DB::table('sellers')
                    ->where('codmun', '!=', '001')
                    ->distinct('codcor')
                    ->count('puesto');

        // $mesasok = DB::table('sellers')
        //             ->select('codcor', 'municipio', 'puesto', 'candidato', 
        //             DB::raw('SUM(mesa <> "Rem") as mesas'), 
        //             DB::raw('SUM(CASE WHEN status = 1 AND mesa != "Rem" THEN 1 ELSE 0 END) as mesas_ok'),
        //                 DB::raw('SUM(mesa = "Rem") as rem'),
        //                 DB::raw('SUM(mesa = "Rem" AND status = 1) as rem_ok'))
                  
                    
        //             ->groupBy('codcor', 'municipio', 'puesto','candidato')
        //             ->orderBy('codcor')
        //             ->get();    

        $mesasok = DB::table('sellers')
                ->select(
                    'municipio',
                    'puesto',

                    // Mesas por candidato
                    DB::raw('SUM(CASE WHEN mesa <> "Rem" AND candidato = 101 THEN 1 ELSE 0 END) AS mesas_101'),
                    DB::raw('SUM(CASE WHEN mesa <> "Rem" AND candidato = 103 THEN 1 ELSE 0 END) AS mesas_103'),
                    DB::raw('SUM(CASE WHEN mesa <> "Rem" AND candidato = 4   THEN 1 ELSE 0 END) AS mesas_04'),

                    // Total mesas
                    DB::raw('SUM(CASE WHEN mesa <> "Rem" THEN 1 ELSE 0 END) AS total_mesas'),

                    // Mesas OK por candidato
                    DB::raw('SUM(CASE WHEN mesa <> "Rem" AND candidato = 101 AND status = 1 THEN 1 ELSE 0 END) AS ok_101'),
                    DB::raw('SUM(CASE WHEN mesa <> "Rem" AND candidato = 103 AND status = 1 THEN 1 ELSE 0 END) AS ok_103'),
                    DB::raw('SUM(CASE WHEN mesa <> "Rem" AND candidato = 4   AND status = 1 THEN 1 ELSE 0 END) AS ok_04'),

                    // Remanentes
                    DB::raw('SUM(CASE WHEN mesa = "Rem" THEN 1 ELSE 0 END) AS rem'),
                    DB::raw('SUM(CASE WHEN mesa = "Rem" AND status = 1 THEN 1 ELSE 0 END) AS rem_ok')
                )
                ->groupBy('municipio', 'puesto')
                ->orderBy('municipio')
                ->orderBy('puesto')
                ->get();


            

            $avancePuestos = DB::table('sellers')
                ->select(
                    'codcor',        // 👈 IMPORTANTE
                    'municipio',
                    'puesto',
            
                    // Mesas por candidato
                    DB::raw('SUM(CASE WHEN candidato = 101 AND mesa <> "Rem" THEN 1 ELSE 0 END) as mesas_101'),
                    DB::raw('SUM(CASE WHEN candidato = 103 AND mesa <> "Rem" THEN 1 ELSE 0 END) as mesas_103'),
                    DB::raw('SUM(CASE WHEN candidato = 4   AND mesa <> "Rem" THEN 1 ELSE 0 END) as mesas_04'),
            
                    // Mesas OK por candidato
                    DB::raw('SUM(CASE WHEN candidato = 101 AND status = 1 AND mesa <> "Rem" THEN 1 ELSE 0 END) as ok_101'),
                    DB::raw('SUM(CASE WHEN candidato = 103 AND status = 1 AND mesa <> "Rem" THEN 1 ELSE 0 END) as ok_103'),
                    DB::raw('SUM(CASE WHEN candidato = 4   AND status = 1 AND mesa <> "Rem" THEN 1 ELSE 0 END) as ok_04'),
            
                    // Totales
                    DB::raw('SUM(mesa <> "Rem") as total_mesas'),
                    DB::raw('SUM(CASE WHEN status = 1 AND mesa <> "Rem" THEN 1 ELSE 0 END) as total_ok'),
            
                    // Remanentes
                    DB::raw('SUM(mesa = "Rem") as rem'),
                    DB::raw('SUM(CASE WHEN mesa = "Rem" AND status = 1 THEN 1 ELSE 0 END) as rem_ok')
                )
                ->groupBy('codcor', 'municipio', 'puesto')
                ->orderBy('codcor', 'asc')    // 👈 ORDEN PRINCIPAL
                ->orderBy('puesto')      // 👈 ORDEN SECUNDARIO
                ->get();
            


        

       
                     
        return view('admin.consultors.index', compact('data', 'dat', 'not', 'lablemun', 'okmun', 'nookmun', 'okaniv','nookaniv', 'okanim','nookanim','remokd','remnookd','remokv','remnookv','remokm','remnookm', 'puestosd', 'puestosv' , 'puestosm', 'mesasok', 'avancePuestos'))
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
