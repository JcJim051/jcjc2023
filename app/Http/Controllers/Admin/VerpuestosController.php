<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Verpuestos;
use Illuminate\Http\Request;
use App\Models\Puestos;

class VerpuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verpuestos = puestos::all();
        return view('admin.verpuestos.index', compact('verpuestos'));
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
     * @param  \App\Models\Verpuestos  $verpuestos
     * @return \Illuminate\Http\Response
     */
    public function show(Verpuestos $verpuestos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Verpuestos  $verpuestos
     * @return \Illuminate\Http\Response
     */
    public function edit(Verpuestos $verpuestos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Verpuestos  $verpuestos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verpuestos $verpuestos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Verpuestos  $verpuestos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verpuestos $verpuestos)
    {
        //
    }
}
