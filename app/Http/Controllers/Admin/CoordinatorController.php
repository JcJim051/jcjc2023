<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = auth()->user()->codcozon;

        if ($active == 100) {
            $sellers = Seller::all();
        } else {

            $sellers = Seller::where('codescru' , $active)->get();
        }

        return view('admin.coordinators.index', compact('sellers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $coordinator)
    {
        return view('admin.coordinators.edit', compact('coordinator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $coordinator)
    {
        $request->validate([
            'cedula' => 'required',
            'nombre' => 'required',
            'email' => "required|unique:sellers,email,$coordinator->id",
            'telefono' => 'required'
        ]);

        $coordinator->update($request->all());

        return redirect()->route('admin.coordinators.edit', $coordinator)->with('info', 'La informacion se actualizo con exito');
    }
}
