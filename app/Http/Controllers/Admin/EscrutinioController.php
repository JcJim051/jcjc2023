<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Seller;
use Illuminate\Http\Request;

class EscrutinioController extends Controller
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
               if ($municipio == 0) {
                $sellers = Seller::where('mesa','<>', 'Rem')->where('codmun' ,'<>', '001')->get();
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
                            if ($role == 5) {
                                $sellers = Seller::where('mesa','<>', 'Rem')->get();
                            } else {
    
                            }
                        }
                     }


            }
         }



        return view('admin.escrutinio.index', compact('sellers'));

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
     * @param  \App\Models\Escrutinio  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\seller  $esc
     * @return \Illuminate\Http\Response
     */
    public function edit(seller $escrutinio)
    {

        return view('admin.escrutinio.edit', compact('escrutinio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, seller $escrutinio)
    {
        $escrutinio->update($request->all());

        return redirect()->route('admin.escrutinio.index', $escrutinio)->with('info', 'Se Reporto recuperacion de votos correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escrutinio  $escrutinio
     * @return \Illuminate\Http\Response
     */
    public function destroy(seller $seller)
    {
        //
    }
}
