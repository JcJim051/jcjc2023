<?php

namespace App\Http\Controllers\Admin;

use Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;


class FotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(Seller $foto)
    {
        return view('admin.tellers.edit3', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $foto)
    {
        return view('admin.tellers.edit2', compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function segundafoto(Request $request , Seller $foto  )
    {   
       
        $id = $request->id;
        $mesa = Seller::where('id', $id)->get();
        
        if ($request->input('e14_resized') !== null) {
            // Obtén la imagen redimensionada del campo oculto
            $e14Resized = $request->input('e14_resized');
        
            // Decodifica la imagen redimensionada desde formato base64
            $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $e14Resized));
        
            // Genera un nombre único para el archivo JPEG
            $uniqueFilename = uniqid() . '_' . $request->user()->id . '.jpg';
        
            // Ruta donde deseas guardar la imagen redimensionada
            $path = 'E14-images/' . $uniqueFilename;
        
            // Guarda la imagen redimensionada en la ubicación deseada
            Storage::put($path, $decodedImage);
        
            // Actualiza el campo 'e14' en el modelo Seller
            $foto = Seller::where('id', $id)->first();
            $foto->e14 = $path;
            $foto->save();
        }
        if ($request->input('e14_2_resized') !== null) {
            // Obtén la imagen redimensionada del campo oculto
            $e14_2Resized = $request->input('e14_2_resized');
        
            // Decodifica la imagen redimensionada desde formato base64
            $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $e14_2Resized));
        
            // Genera un nombre único para el archivo JPEG
            $uniqueFilename = uniqid() . '_' . $request->user()->id . '.jpg';
        
            // Ruta donde deseas guardar la imagen redimensionada
            $path = 'e14-images/' . $uniqueFilename;
        
            // Guarda la imagen redimensionada en la ubicación deseada
            Storage::put($path, $decodedImage);
        
            // Actualiza el campo 'e14_2' en el modelo Seller
            $foto = Seller::where('id', $id)->first();
            $foto->e14_2 = $path;
            $foto->save();
        }

        if ($request->input('fotorec_resized') !== null) {
            // Obtén la imagen redimensionada del campo oculto
            $fotorecResized = $request->input('fotorec_resized');
        
            // Decodifica la imagen redimensionada desde formato base64
            $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $fotorecResized));
        
            // Genera un nombre único para el archivo JPEG
            $uniqueFilename = uniqid() . '_' . $request->user()->id . '.jpg';
        
            // Ruta donde deseas guardar la imagen redimensionada
            $path = 'fotorec-images/' . $uniqueFilename;
        
            // Guarda la imagen redimensionada en la ubicación deseada
            Storage::put($path, $decodedImage);
        
            // Actualiza el campo 'fotorec' en el modelo Seller
            $foto = Seller::where('id', $id)->first();
            $foto->fotorec = $path;
            $foto->save();
        }
        // dd($mesa[0]->reclamacion);
        $foto = $id;
        $role = auth()->user()->role;
        $id_user = auth()->user()->id;
        if ($mesa[0]->reclamacion == 1) {
            return redirect()->route('admin.fotos.show',compact('foto'))->with('info', 'Segunda cara del E14 enviada                                                                                                                                                                                     con Éxito');
        } else {
            
            if ($role == 7 or $id_user == 2)  {
                return redirect()->route('admin.pmu.index')->with('info', 'Evidencias enviadas con Éxito');
            } else {
                return redirect()->route('admin.tellers.index')->with('info', 'Evidencias enviadas con Éxito');
            }
            
            
        }
        
    }
    public function reclamacion(Request $request , Seller $foto  )
    {   
       
        $id = $request->id;
        $mesa = Seller::where('id', $id)->get();
        
        if ($request->input('e14_resized') !== null) {
            // Obtén la imagen redimensionada del campo oculto
            $e14Resized = $request->input('e14_resized');
        
            // Decodifica la imagen redimensionada desde formato base64
            $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $e14Resized));
        
            // Genera un nombre único para el archivo JPEG
            $uniqueFilename = uniqid() . '_' . $request->user()->id . '.jpg';
        
            // Ruta donde deseas guardar la imagen redimensionada
            $path = 'E14-images/' . $uniqueFilename;
        
            // Guarda la imagen redimensionada en la ubicación deseada
            Storage::put($path, $decodedImage);
        
            // Actualiza el campo 'e14' en el modelo Seller
            $foto = Seller::where('id', $id)->first();
            $foto->e14 = $path;
            $foto->save();
        }
        if ($request->input('e14_2_resized') !== null) {
            // Obtén la imagen redimensionada del campo oculto
            $e14_2Resized = $request->input('e14_2_resized');
        
            // Decodifica la imagen redimensionada desde formato base64
            $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $e14_2Resized));
        
            // Genera un nombre único para el archivo JPEG
            $uniqueFilename = uniqid() . '_' . $request->user()->id . '.jpg';
        
            // Ruta donde deseas guardar la imagen redimensionada
            $path = 'e14-images/' . $uniqueFilename;
        
            // Guarda la imagen redimensionada en la ubicación deseada
            Storage::put($path, $decodedImage);
        
            // Actualiza el campo 'e14_2' en el modelo Seller
            $foto = Seller::where('id', $id)->first();
            $foto->e14_2 = $path;
            $foto->save();
        }

        if ($request->input('fotorec_resized') !== null) {
            // Obtén la imagen redimensionada del campo oculto
            $fotorecResized = $request->input('fotorec_resized');
        
            // Decodifica la imagen redimensionada desde formato base64
            $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $fotorecResized));
        
            // Genera un nombre único para el archivo JPEG
            $uniqueFilename = uniqid() . '_' . $request->user()->id . '.jpg';
        
            // Ruta donde deseas guardar la imagen redimensionada
            $path = 'fotorec-images/' . $uniqueFilename;
        
            // Guarda la imagen redimensionada en la ubicación deseada
            Storage::put($path, $decodedImage);
        
            // Actualiza el campo 'fotorec' en el modelo Seller
            $foto = Seller::where('id', $id)->first();
            $foto->fotorec = $path;
            $foto->save();
        }
        // dd($mesa[0]->reclamacion);
        $foto = $id;
       
      
            return redirect()->route('admin.tellers.index')->with('info', 'Reporte de votos se actualizó con Éxito');
            
        
        
    }

}

