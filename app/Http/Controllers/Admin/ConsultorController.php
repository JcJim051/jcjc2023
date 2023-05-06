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


        $okd = DB::table('sellers')
                        ->select("status")
                        ->whereStatus("1")
                        ->count();


        $nookd = DB::table('sellers')
                        ->select("status")
                        ->whereStatus("0")
                        ->count();

        $okv = DB::table('sellers')
                        ->select("codmun")
                        ->whereCodmun("001")
                        ->whereStatus("1")
                        ->count();


        $nookv = DB::table('sellers')
                        ->select("status")
                        ->where('Codmun','=','001')
                        ->whereStatus("0")
                        ->count();

        $okm = DB::table('sellers')
                        ->select("codmun")
                        ->where('Codmun','<>','001')
                        ->whereStatus("1")
                        ->count();


        $nookm = DB::table('sellers')
                        ->select("status")
                        ->where('Codmun','<>','001')
                        ->whereStatus("0")
                        ->count();
        // status ok
        $sok = 1;
        // Status nook
        $snook = 0;

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

        $lablemun =  DB::table('sellers')
                ->select('municipio', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                ->groupBy('municipio')
                ->get();

        $okmun =  DB::table('sellers')
                ->select('municipio', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                ->groupBy('municipio')
                ->get();

        $nookmun =  DB::table('sellers')
                ->select('municipio', DB::raw('sum(status) as T'), DB::raw('count(*) - sum(status) as F'))
                ->groupBy('municipio')
                ->get();



         //$data = v($array);

        //dd($lablemun);


        return view('admin.consultors.index', compact('data', 'dat', 'not', 'lablemun', 'okmun', 'nookmun'))
                                                    ->with('okd', $okd)
                                                    ->with('nookd', $nookd)
                                                    ->with('nookv', $nookv)
                                                    ->with('okv', $okv)
                                                    ->with('nookm', $nookm)
                                                    ->with('okm', $okm)
                                                    ->with('data', $data);
}
}
