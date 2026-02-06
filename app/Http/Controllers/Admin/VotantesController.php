<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class VotantesController extends Controller
{
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
        $role = $user->role;
        $idUser = $user->id;
    
        // Convertimos campos guardados como texto a arrays
        $userCandidatos = $user->candidatos ? explode(',', $user->candidatos) : [];
        $userMunicipios = $user->mun ? explode(',', $user->mun) : [];
        $userPuestos = $user->codpuesto ? explode(',', $user->codpuesto) : [];
        $escrutador = $user->codzon;
    
        $sellers = Seller::query();
    
        if ($role == 1) { // ADMIN
            if ($idUser == 1 || in_array('999', $userMunicipios)) {
                // Muestra todo
                $sellers = $sellers->get();
            } else {
                // Filtra por municipios
                $sellers = $sellers->whereIn('codmun', $userMunicipios);
    
                // Filtra por candidatos si tiene asignados
                if (!empty($userCandidatos)) {
                    $sellers = $sellers->whereIn('candidato', $userCandidatos);
                }
    
                $sellers = $sellers->get();
            }
        } elseif ($role == 2) { // ESCRUTADOR
            $sellers = $sellers->where('codescru', $escrutador)->get();
        } elseif ($role == 3) { // COORDINADOR
            $sellers = $sellers->whereIn('codcor', $userPuestos);
    
            // Filtra por candidatos
            if (!empty($userCandidatos)) {
                $sellers = $sellers->whereIn('candidato', $userCandidatos);
            }
    
            $sellers = $sellers->get();
        } elseif ($role == 4 || $role == 5) { // Otros roles
            $sellers = $sellers->get();
        } else {
            $sellers = collect();
        }
    
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
