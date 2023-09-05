<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Puestos;

class PosesionController extends Controller
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
        $municipio = auth()->user()->mun;

        if ($role == 1) {
            // 1 = villao
            if ($municipio == 1) {
                $sellers = Seller::where('codmun' , 001)->get();
            } else {
               if ($municipio == 0) {
                $sellers = Seller::where('codmun' ,'<>', '001')->where('cod_ruta' , $ruta)->get();
               } else {
                $sellers = Seller::all();
               }            
                
                   
                
            }
        } else {
            if ($role == 2) {
                $sellers = Seller::where('codescru' , $escrutador)->get();
            } else {

                if ($role == 3) {
                    $sellers = Seller::where('codcor' , $coordinador)->get();
                } else {
                        
                     }


            }
         }



        return view('admin.posesion.index', compact('sellers'));


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
    public function edit($ani)
    {
        $superuser = Seller::where('id' , $ani)->get();

        return view('admin.posesion.edit', compact('ani',))->with('superuser', $superuser);
    

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
