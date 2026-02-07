<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Traits\Compartimentacion;

class VotantesController extends Controller
{
    use Compartimentacion;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $role = auth()->user()->role;
    //     $escrutador = auth()->user()->codzon;
    //     $ruta = auth()->user()->codzon;
    //     $coordinador = auth()->user()->codpuesto;
    //     $municipio = auth()->user()->mun;




    //             if ($role == 1) {
    //                if ($municipio == 1) {
    //                     $sellers = Seller::where('mesa','<>', 'Rem')->where('codmun' ,'=', '001')->get();
    //                } else {
    //                 if ($municipio == 0) {
    //                     $sellers = Seller::where('mesa','<>', 'Rem')->where('codmun' ,'<>', '001')->where('cod_ruta' , $ruta)->get();
    //                    } else {
    //                     $sellers = Seller::where('mesa','<>', 'Rem')->get();
    //                    }    
    //                }
                       
    //             } else {
    //                 if ($role == 2) {
    //                     $sellers = Seller::where('mesa','<>', 'Rem')->where('codescru' , $escrutador)->get();
    //                 } else {

    //                     if ($role == 3) {
    //                         $sellers = Seller::where('mesa','<>', 'Rem')->where('codcor' , $coordinador)->get();
    //                     } else {
    //                             if ($role == 4) {
    //                                 $sellers = Seller::where('mesa','<>', 'Rem')->get();
    //                             } else {
                                    
    //                             }
    //                          }


    //                 }
    //              }

               

    //     return view('admin.votantes.index', compact('sellers'));

    //     // $sellers = Seller::all();

    //     // return view('admin.tellers.index', compact('sellers'));
    // }
    public function index()
    {
       
        $user = auth()->user();
        $sellers = $this->filtrarSellersPorUsuario($user);
        return view('admin.votantes.index', compact('sellers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $votante)
    {
        return view('admin.votantes.edit', compact('votante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $votante)
    {



        if($request->hasfile('e14')){

            $votante['e14']= $request->file('e14')->getClientOriginalName();
            $request->file('e14');

            $votante['e14']= $request->file('e14')->store('/E14-images');


        }
        if($request->hasfile('fotorec')){

            $votante['fotorec']= $request->file('fotorec')->getClientOriginalName();
            $request->file('fotorec');

            $votante['fotorec']= $request->file('fotorec')->store('/reclamaciones-images');


        }

        $votante->update($request->all());


        return redirect()->route('admin.votantes.index', $votante)->with('info', 'Reporte de afluencia se actualizó con Éxito');
    }
}
