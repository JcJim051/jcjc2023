<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;

class ConsultasController extends Controller
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
        $coordinador = auth()->user()->codpuesto;
        $municipio = auth()->user()->mun;




        if ($role == 1) {
            // 1 = villao
            if ($municipio == 1) {
                $sellers = Seller::where('mesa','<>', 'Rem')->where('codmun' , 001)->get();
            } else {
                // 0 = municipios
                if ($municipio == 0) {
                } else {
                    $sellers = Seller::where('mesa','<>', 'Rem')->get();
                }
            }
        } else {
            if ($role == 2) {
                $sellers = Seller::where('mesa','<>', 'Rem')->where('codescru' , $escrutador)->get();
            } else {

                if ($role == 3) {
                    $sellers = Seller::where('mesa','<>', 'Rem')->where('codcor' , $coordinador)->get();
                } else {
                        if ($role == 4) {
                            $sellers = Seller::where('mesa','<>', 'Rem')->get();
                        } else {

                        }
                     }


            }
         }



        return view('admin.consultas.index', compact('sellers'));
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
