<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Puestos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class SuperUserController extends Controller
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
                                if ($role == 4 or $role == 5) {
                                    $sellers = Seller::all();
                                } else {

                                }

                             }


                    }
                 }


        return view('admin.superusers.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.superusers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request->email == null) {

        } else {
            $request->validate([

                'email' => 'unique:sellers',
    
            ]);
        }
        
        

        $seller = Seller::create($request->all());
        
        
        return redirect()->route('admin.superusers.edit', $seller)->with('info', 'El testigo se registro con exito');

    }

    public function edit(Seller $superuser)
    {
        
        $puestos= Puestos::all();
        return view('admin.superusers.edit', compact('superuser', 'puestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $superuser)
    {

        
        if ($request->email == null) {

        } else {
            $request->validate([

                'email' => 'unique:sellers,email,' . $superuser->id,
                'cedula' => 'unique:sellers,cedula,' . $superuser->id,
            ]);
        };
        if($request->hasfile('pdf')){

        $superuser['pdf']= $request->file('pdf')->getClientOriginalName();
        $request->file('pdf');

        $superuser['pdf']= $request->file('pdf')->store('/cedulas-pdf');


    }

            $superuser->update($request->all());

            if ($request->statusani == null  & $request->statusrec == null & $request->statusasistencia == null)  {
                return redirect()->route('admin.superusers.index', $superuser)->with('info', ' Testigo actualizado con exito');
            } else {
                if ($request->statusrec == null & $request->statusasistencia == null) {
                    return redirect()->route('admin.ani.index', $superuser)->with('info', ' Validacion Ani Guardada con Exito');
                } else {
                    if ($request->statusasistencia == null) {
                        return redirect()->route('admin.ani.index', $superuser)->with('info', 'Revicion E24 Guardada con Exito');
                    } else {
                        return redirect()->route('admin.posesion.index', $superuser)->with('info', 'Reporte de asistencia Guardado con Exito');
                    }
                }
            }
            

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $superuser)
    {

        $superuser->delete();
        return redirect()->route('admin.superusers.index')->with('info', 'El testigo se elimino con exito');
    }


}
