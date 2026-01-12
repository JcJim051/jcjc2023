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
        $ruta = auth()->user()->codzon;
        $coordinador = auth()->user()->codpuesto;
        $municipio = auth()->user()->mun;
        $idUser = auth()->id();



                if ($role == 1) {
                    // 1 = villa-{-.…o
                        if ($idUser == 1 || $municipio == 999) {
                            // Muestra todo
                            $sellers = Seller::get();
                        } else {
                            // Muestra solo los de su municipio
                            $sellers = Seller::where('codmun', $municipio)
                                             ->get();
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
                                    $sellers = [];
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
        
    
        
       if ($superuser->pdf == null) {
            $request->validate([
                'email' => [
                    'nullable',
                    Rule::unique('sellers')->ignore($superuser->id)->whereNotNull('email'),
                ],
                'cedula' => [
                    'nullable',
                    Rule::unique('sellers')->ignore($superuser->id)->whereNotNull('cedula'),
                ],
                'pdf' => 'required',
                
                         
            ]);
        } else {
                $request->validate([
                'email' => [
                    'nullable',
                    Rule::unique('sellers')->ignore($superuser->id)->whereNotNull('email'),
                ],
                'cedula' => [
                    'nullable',
                    Rule::unique('sellers')->ignore($superuser->id)->whereNotNull('cedula'),
                ],
                     
            ]);
        }
        
        if($request->hasfile('pdf')){

        $superuser['pdf']= $request->file('pdf')->getClientOriginalName();
        $request->file('pdf');

        $superuser['pdf']= $request->file('pdf')->store('/cedulas-pdf');


    }

            $superuser->update($request->all());

            if ($request->statusani == null  & $request->statusrec == null & $request->statusasistencia == null & $request->modificadopor_pmu == null)  {
                return redirect()->route('admin.superusers.index', $superuser)->with('info', ' Testigo actualizado con exito');
            } else {
                if ($request->statusrec == null & $request->statusasistencia == null  & $request->modificadopor_pmu == null) {
                    return redirect()->route('admin.ani.index', $superuser)->with('info', ' Validación Ani Guardada con Exito');
                } else {
                    if ($request->statusasistencia <> null  & $request->modificadopor_pmu == null) {
                        return redirect()->route('admin.posesion.index', $superuser)->with('info', 'Reporte de asistencia Guardado con Exito');
                    } else {
                        if ($request->modificadopor_pmu <> null) {
                            return redirect()->route('admin.pmu.index', $superuser)->with('info', 'Correccion mesa de crisis, reportada con exito');
                        } else {
                            return redirect()->route('admin.revision.index', $superuser)->with('info', 'Revisión E24 Guardada con Exito');
                        }
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
