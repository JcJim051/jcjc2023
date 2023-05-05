<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function __invoke()
    {

        $role = auth()->user()->role;

        if ($role == 1) {
            $rol = 'Administrador';
        } else {
            if ($role == 2) {
                $rol = 'Esctrutador';
            } else {
                if ($role == 3) {
                    $rol = 'Coordinador';
                } else {
                    if ($role == 4) {
                        $rol = 'Consulta';
                    } else {

                    }
                }
            }
        }

        $escrutador = auth()->user()->codzon;
        $coordinador = auth()->user()->codpuesto;
        $municipio = auth()->user()->mun;

        $seller = Seller::where('codcor', $coordinador)->first();

        $data =  DB::table('sellers')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        $dat =  DB::table('sellers')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        $not =  DB::table('sellers')
                    ->select('codescru', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                    ->groupBy('codescru')
                    ->get();
        // total mesas por colegio
        $tmc = Seller::where('codcor', $coordinador)
        ->count();
        // total mesas listas
        $tml = Seller::where('codcor', $coordinador)
                    ->where('status', '1')
                    ->count();
        //total mesas por comision
        $tmcom =Seller::where('codescru', $escrutador)
                    ->count();
           //total mesas listas por comision
        $tmlc =Seller::where('codescru', $escrutador)
                    ->where('status', '1')
                    ->count();


//$data = v($array);

        // dd($tmc);

    return view('admin.index', compact('rol', 'seller' ,'data', 'dat', 'not','tmc', 'tml','tmcom', 'tmlc'));


}
}
