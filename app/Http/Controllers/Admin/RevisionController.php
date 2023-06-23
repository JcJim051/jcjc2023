<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Puestos;

use Illuminate\Http\Request;

class RevisionController extends Controller
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
        $user = auth()->user();



            if ($role == 1) {
                // 1 = villao
                if ($municipio == 1) {
                    $sellers = Seller::where('recuperados','<>', '' )->get();
                } else {
                    // 0 = municipios
                   if ($municipio == 0) {
                    $sellers = Seller::where('recuperados','<>', '' )->get();
                   } else {
                    $sellers = Seller::where('recuperados','<>', '' )->get();
                   }    
                }
            }else {

                if ($role == 6 or $role == 2) {
                    $sellers = Seller::where('recuperados','<>', '' )->get();
                } else {
        
                }
                }
        return view('admin.revision.index', compact('sellers'));
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

        
        
        
        
        
        $puestos= Puestos::all();

        // dd($puestos);
        return view('admin.revision.edit', compact('puestos', 'ani',))->with('superuser', $superuser);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $ani)
    {

        dd($ani);
       

            $ani->update($request->all());

        return redirect()->route('admin.revision.index', $ani)->with('info', ' Confirmacion de E24 actualizada con exito');
    }
}
