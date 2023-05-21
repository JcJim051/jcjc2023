<?php

namespace App\Http\Controllers\Admin;;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Puestos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AniController extends Controller
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
                    $sellers = Seller::whereStatus("1")->where('codmun' , 001)->get();
                } else {
                    // 0 = municipios
                   if ($municipio == 0) {
                    $sellers = Seller::whereStatus("1")->where('codmun' ,'<>' , '001')->get();
                   } else {
                    $sellers = Seller::whereStatus("1")->get();
                   }    
                }
            }else {

                if ($role == 5 ) {
                    $sellers = Seller::whereStatus("1")->get();
                } else {
        
                }
            }
        return view('admin.ani.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sellers$sellers.create');
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

                'email' => 'unique:ani',
    
            ]);
        }
        
        

        $seller = Seller::create($request->all());
        return redirect()->route('admin.ani.edit', $seller)->with('info', 'El testigo se registro con exito');

    }

    public function edit($ani)
    {
        $superuser = Seller::where('id' , $ani)->get();

        
        
        
        
        
        $puestos= Puestos::all();

        // dd($puestos);
        return view('admin.ani.edit', compact('puestos', 'ani',))->with('superuser', $superuser);
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

        
        if ($request->email == null) {

        } else {
            $request->validate([

                'email' => 'unique:ani,email,' . $ani->id,
                'cedula' => 'unique:ani,cedula,' . $ani->id,
            ]);
        };
        if($request->hasfile('pdf')){

        $ani['pdf']= $request->file('pdf')->getClientOriginalName();
        $request->file('pdf');

        $ani['pdf']= $request->file('pdf')->store('/cedulas-pdf');


    }

            $ani->update($request->all());

        return redirect()->route('admin.ani.index', $ani)->with('info', ' Testigo actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $ani)
    {

        $ani->delete();
        return redirect()->route('admin.ani.index')->with('info', 'El testigo se elimino con exito');
    }


}
