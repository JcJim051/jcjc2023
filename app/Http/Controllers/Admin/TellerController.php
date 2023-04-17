<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class TellerController extends Controller
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
                        $sellers = Seller::where('codmun' , 001)->get();
                    } else {
                        // 0 = municipios
                        if ($municipio == 0) {
                            $sellers = Seller::where('codmun' , '<>', 001)->get();
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
                                if ($role == 4) {
                                    $sellers = Seller::all();
                                } else {

                                }
                             }


                    }
                 }



        return view('admin.tellers.index', compact('sellers'));

        // $sellers = Seller::all();

        // return view('admin.tellers.index', compact('sellers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $teller)
    {
        return view('admin.tellers.edit', compact('teller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $teller)
    {
        $request->validate([

            'email' => "unique:sellers,email,$teller->id",

        ]);


        if($request->hasfile('e14')){

            $teller['e14']= $request->file('e14')->getClientOriginalName();
            $request->file('e14')->storeAs('e14',$teller['pdf']);

            $teller['e14']= $request->file('e14')->store('/E14-images');


        }

        $teller->update($request->all());


        return redirect()->route('admin.tellers.index', $teller)->with('info', 'Reporte de votos se actualizo con exito');
    }
}
