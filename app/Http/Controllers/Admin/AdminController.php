<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{   //para acreditacion
    // public function __invoke()
    // {

    //     $role = auth()->user()->role;

    //     if ($role == 1) {
    //         $rol = 'Administrador';
    //     } else {
    //         if ($role == 2) {
    //             $rol = 'Coordinador';
    //         } else {
    //             if ($role == 3) {
    //                 $rol = 'Delegado';
    //             } else {
    //                 if ($role == 4) {
    //                     $rol = 'Consulta';
    //                 } else {
    //                     if ($role == 5) {
    //                         $rol = 'Validador Ani';
    //                     } else {
    //                         if ($role == 6) {
    //                             $rol = 'Auditor';
    //                         } else {
    //                             if ($role == 7) {
    //                                 $rol = 'Mesa de Crisis';
    //                             } else {
                                    
    //                             }
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }

    //     $escrutador = auth()->user()->codzon;
    //     $coordinador = auth()->user()->codpuesto;
    //     $municipio = auth()->user()->mun;

    //     $seller = Seller::where('codcor', $coordinador)->first();
    //     $seller1 = Seller::where('codcor', $coordinador)->first();

    //     $mun = Seller::where('codmun', $escrutador)->first();
        
    //     if ($municipio == 1) {
    //         $data =  DB::table('sellers')
    //                 ->where('codmun','=','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('codescru')
    //                 ->get();
    //     } else {
    //         $data =  DB::table('sellers')
    //                 ->where('codmun','<>','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('codescru')
    //                 ->get();
    //     }

    //     if ($municipio == 1) {
    //         $datas =  DB::table('sellers')
    //                 ->where('codmun','=','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('codescru')
    //                 ->get();
    //     } else {
    //         $datas =  DB::table('sellers')
    //                 ->where('codmun','<>','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('municipio', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('municipio')
    //                 ->get();
    //     }
        
    //     if ($municipio == 1) {
    //         $dat =  DB::table('sellers')
    //                 ->where('codmun','=','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('codescru')
    //                 ->get();
    //     } else {
    //         $dat =  DB::table('sellers')
    //                 ->where('codmun','<>','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('codescru')
    //                 ->get();
    //     }
        
    //     if ($municipio == 1) {
    //         $dats =  DB::table('sellers')
    //                 ->where('codmun','=','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('codescru')
    //                 ->get();
    //     } else {
    //         $dats =  DB::table('sellers')
    //                 ->where('codmun','<>','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('codescru')
    //                 ->get();
    //     }

       
    //     if ($municipio == 1) {
    //         $not =  DB::table('sellers')
    //                 ->where('codmun','=','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('codescru')
    //                 ->get();
    //     } else {
    //         $not =  DB::table('sellers')
    //                 ->where('codmun','<>','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('codescru')
    //                 ->get();
    //     }
    //     if ($municipio == 1) {
    //         $nots =  DB::table('sellers')
    //                 ->where('codmun','=','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('codescru')
    //                 ->get();
    //     } else {
    //         $nots =  DB::table('sellers')
    //                 ->where('codmun','<>','001')
    //                 ->where('mesa','<>','Rem')
    //                 ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
    //                 ->groupBy('codescru')
    //                 ->get();
    //     }
        
       
    //     // total mesas por colegio
    //     $tmc = Seller::where('codcor', $coordinador)
    //     ->where('mesa','<>', 'Rem')->count();
    //     //total remanentes por colegio
    //     $tremc = Seller::where('codcor', $coordinador)
    //     ->where('mesa','=', 'Rem')->count();

    //     // total mesas listas
    //     $tml = Seller::where('codcor', $coordinador)
    //                 ->where('mesa','<>', 'Rem')
    //                 ->where('status', '1')
    //                 ->count();
    //     // total remanentes listoss
    //     $treml = Seller::where('codcor', $coordinador)
    //             ->where('status', '1')
    //             ->where('mesa','=', 'Rem')
    //             ->count();
        
    //     //total mesas por comision
    //     $tmcom =Seller::where('codescru', $escrutador)
    //             ->where('mesa','<>', 'Rem')            
    //             ->count();
    //     //total remanentes por comision
    //     $tremcom =Seller::where('codescru', $escrutador)
    //     ->where('mesa','=', 'Rem')->count();
        
    //     //total mesas listas por comision
    //     $tmlc =Seller::where('codescru', $escrutador)
    //                 ->where('status', '1')
    //                 ->where('mesa','<>', 'Rem')
    //                 ->count();
    //     //total remanentes listos por comision
    //     $tremlc =Seller::where('codescru', $escrutador)
    //             ->where('mesa','=', 'Rem')
    //             ->where('status', '1')
    //             ->count();


    //      //total mesas por ruta (bloque de municipios)
    //      $tmrut =Seller::where('cod_ruta', $escrutador)
    //         ->where('mesa','<>', 'Rem')            
    //         ->count();
    //     //total remanentes por ruta (bloque de municipios)
    //     $tremrut =Seller::where('cod_ruta', $escrutador)
    //     ->where('mesa','=', 'Rem')->count();
        
    //     //total mesas listas por ruta (bloque de municipios)
    //     $tmlr =Seller::where('cod_ruta', $escrutador)
    //                 ->where('status', '1')
    //                 ->where('mesa','<>', 'Rem')
    //                 ->count();
    //     //total remanentes listos por ruta (bloque de municipios)
    //     $tremlr =Seller::where('cod_ruta', $escrutador)
    //             ->where('mesa','=', 'Rem')
    //             ->where('status', '1')
    //             ->count();

    //     $ttpc =Seller::where('codescru', $escrutador)
    //     ->where('mesa','<>', 'Rem')
    //     ->where('statusasistencia','=', '1')            
    //     ->count();
    //     $trpc =Seller::where('codescru', $escrutador)
    //     ->where('mesa','=', 'Rem')
    //     ->where('statusasistencia','=', '1')            
    //     ->count();





    //     //$data = v($array);

    //     //dd($data);

    //     return view('admin.index', compact('rol', 'mun','seller' , 'seller1' ,'data','datas', 'dat', 'dats', 'not', 'nots','tmc','tremc', 'tml','treml','tmcom','tremcom', 'tmlc', 'tremlc','ttpc','trpc','tmrut', 'tremrut', 'tmlr','tremlr' ));


    // }

    public function __invoke()
    {

        $role = auth()->user()->role;

        if ($role == 1) {
            $rol = 'Administrador';
        } else {
            if ($role == 2) {
                $rol = 'Coordinador';
            } else {
                if ($role == 3) {
                    $rol = 'Delegado';
                } else {
                    if ($role == 4) {
                        $rol = 'Consulta';
                    } else {
                        if ($role == 5) {
                            $rol = 'Validador Ani';
                        } else {
                            if ($role == 6) {
                                $rol = 'Auditor';
                            } else {
                                if ($role == 7) {
                                    $rol = 'Mesa de Crisis';
                                } else {
                                    
                                }
                            }
                        }
                    }
                }
            }
        }

        $escrutador = auth()->user()->codzon;
        $coordinador = auth()->user()->codpuesto;
        $municipio = auth()->user()->mun;

        $seller = Seller::where('codcor', $coordinador)->first();
        $seller1 = Seller::where('codcor', $coordinador)->first();

        $mun = Seller::where('codmun', $escrutador)->first();
        
        if ($municipio == 1) {
            $data =  DB::table('sellers')
                    ->where('codmun','=','001')
                    ->where('mesa','<>','Rem')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        } else {
            $data =  DB::table('sellers')
                    ->where('codmun','<>','001')
                    ->where('mesa','<>','Rem')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        }

        if ($municipio == 1) {
            $datas =  DB::table('sellers')
                    ->where('codmun','=','001')
                    ->where('mesa','<>','Rem')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        } else {
            $datas =  DB::table('sellers')
                    ->where('codmun','<>','001')
                    ->where('mesa','<>','Rem')
                    ->select('municipio', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('municipio')
                    ->get();
        }
        
        if ($municipio == 1) {
            $dat =  DB::table('sellers')
                    ->where('codmun','=','001')
                    ->where('mesa','<>','Rem')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        } else {
            $dat =  DB::table('sellers')
                    ->where('codmun','<>','001')
                    ->where('mesa','<>','Rem')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        }
        
        if ($municipio == 1) {
            $dats =  DB::table('sellers')
                    ->where('codmun','=','001')
                    ->where('mesa','<>','Rem')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        } else {
            $dats =  DB::table('sellers')
                    ->where('codmun','<>','001')
                    ->where('mesa','<>','Rem')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        }

       
        if ($municipio == 1) {
            $not =  DB::table('sellers')
                    ->where('codmun','=','001')
                    ->where('mesa','<>','Rem')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        } else {
            $not =  DB::table('sellers')
                    ->where('codmun','<>','001')
                    ->where('mesa','<>','Rem')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        }
        if ($municipio == 1) {
            $nots =  DB::table('sellers')
                    ->where('codmun','=','001')
                    ->where('mesa','<>','Rem')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        } else {
            $nots =  DB::table('sellers')
                    ->where('codmun','<>','001')
                    ->where('mesa','<>','Rem')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        }
        
       
        // total mesas por colegio
        $tmc = Seller::where('codcor', $coordinador)
            ->where('mesa','<>', 'Rem')
            ->count();
        $tf1 = Seller::where('codcor', $coordinador)
                ->where('mesa','<>', 'Rem')
                ->count();
        $tf2 = Seller::where('codcor', $coordinador)
                ->where('mesa','<>', 'Rem')
                ->count();
        $tfrec = Seller::where('codcor', $coordinador)
                ->where('mesa','<>', 'Rem')
                ->where('reclamacion','=' , '1')
                ->count();
        $tevidencia = $tf1+$tf2+$tfrec;        

        $tde = Seller::where('codcor', $coordinador)
                ->where('mesa','<>', 'Rem')
                ->where('gob1','<>' , null)
                ->count();
    

        $tf1e = Seller::where('codcor', $coordinador)
                ->where('mesa','<>', 'Rem')
                ->where('e14','<>', null)
                ->count();
        $tf2e = Seller::where('codcor', $coordinador)
                ->where('mesa','<>', 'Rem')
                ->where('e14_2','<>', null)
                ->count();
        $tfrece = Seller::where('codcor', $coordinador)
                ->where('mesa','<>', 'Rem')
                ->where('reclamacion','=' , '1')
                ->where('fotorec','<>', null)
                ->count(); 
                
        $tevidencia_enviada = $tf1e+$tf2e+$tfrece; 
        // total mesas listas
        $tml = Seller::where('codcor', $coordinador)
                    ->where('mesa','<>', 'Rem')
                    ->where('status', '1')
                    ->count();
        // total remanentes listoss
        $treml = Seller::where('codcor', $coordinador)
                ->where('status', '1')
                ->where('mesa','=', 'Rem')
                ->count();
        
        //total mesas por comision
        $tmcom =Seller::where('codescru', $escrutador)
                ->where('mesa','<>', 'Rem')            
                ->count();
        //total remanentes por comision
        $tremcom =Seller::where('codescru', $escrutador)
        ->where('mesa','=', 'Rem')->count();
        
        //total mesas listas por comision
        $tmlc =Seller::where('codescru', $escrutador)
                    ->where('status', '1')
                    ->where('mesa','<>', 'Rem')
                    ->count();
        //total remanentes listos por comision
        $tremlc =Seller::where('codescru', $escrutador)
                ->where('mesa','=', 'Rem')
                ->where('status', '1')
                ->count();


         //total mesas por ruta (bloque de municipios)
         $tmrut =Seller::where('cod_ruta', $escrutador)
            ->where('mesa','<>', 'Rem')            
            ->count();
        //total remanentes por ruta (bloque de municipios)
        $tremrut =Seller::where('cod_ruta', $escrutador)
        ->where('mesa','=', 'Rem')->count();
        
        //total mesas listas por ruta (bloque de municipios)
        $tmlr =Seller::where('cod_ruta', $escrutador)
                    ->where('status', '1')
                    ->where('mesa','<>', 'Rem')
                    ->count();
        //total remanentes listos por ruta (bloque de municipios)
        $tremlr =Seller::where('cod_ruta', $escrutador)
                ->where('mesa','=', 'Rem')
                ->where('status', '1')
                ->count();

        $ttpc =Seller::where('codescru', $escrutador)
        ->where('mesa','<>', 'Rem')
        ->where('statusasistencia','=', '1')            
        ->count();
        $trpc =Seller::where('codescru', $escrutador)
        ->where('mesa','=', 'Rem')
        ->where('statusasistencia','=', '1')            
        ->count();





        //$data = v($array);

        //dd($data);

        return view('admin.index', compact('tevidencia','tevidencia_enviada','tde','rol', 'mun','seller' , 'seller1' ,'data','datas', 'dat', 'dats', 'not', 'nots','tmc','tml','treml','tmcom','tremcom', 'tmlc', 'tremlc','ttpc','trpc','tmrut', 'tremrut', 'tmlr','tremlr' ));


    }
}
