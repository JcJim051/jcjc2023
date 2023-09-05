<?php

namespace App\Http\Controllers\Admin;

use Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class TellerController extends Controller
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




                if ($role == 1) {
                   if ($municipio == 1) {
                        $sellers = Seller::where('mesa','<>', 'Rem')->where('codmun' ,'=', '001')->get();
                   } else {
                    if ($municipio == 0) {
                        $sellers = Seller::where('mesa','<>', 'Rem')->where('codmun' ,'<>', '001')->where('cod_ruta' , $ruta)->get();
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
                                    
                                }
                             }


                    }
                 }

               

        return view('admin.tellers.index', compact('sellers'));

        // $sellers = Seller::all();

        // return view('admin.tellers.index', compact('sellers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $teller)
    {
        return view('admin.tellers.edit', compact('teller'));
    }

    public function show(Seller $teller)
    {
           return view('admin.tellers.edit1', compact('teller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $teller)
    {



        if($request->hasfile('e14')){
            $image = $request->file('e14');
            $imageName = $image->getClientOriginalName();
            
            // Redimensionar la imagen
            $resizedImage = Image::make($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
    
            // Almacenar la imagen redimensionada
            $path = 'E14-images/' . $imageName;
            Storage::put($path, (string) $resizedImage->encode());
            dd($path);
            $teller['e14'] = $path;
           
        }
        if($request->hasfile('fotorec')){
            $image1 = $request->file('fotorec');
            $imageName = $image1->getClientOriginalName();
            
            // Redimensionar la imagen
            $resizedImage = Image::make($image1)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
    
            // Almacenar la imagen redimensionada
            $path = 'reclamaciones-images/' . $imageName;
            Storage::put($path, (string) $resizedImage->encode());
    
            $teller['fotorec'] = $path;

        }

        $teller->update($request->all());


        return redirect()->route('admin.tellers.index', $teller)->with('info', 'Reporte de votos se actualizó con Éxito');
    }

    public function fotos(Request $request , Seller $teller  )
    {   
        
        $id = $request->id;
        
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
            $teller = Seller::where('id', $id)->first();
            $teller->e14 = $path;
            $teller->save();
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
            $teller = Seller::where('id', $id)->first();
            $teller->e14_2 = $path;
            $teller->save();
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
            $teller = Seller::where('id', $id)->first();
            $teller->fotorec = $path;
            $teller->save();
        }
        

       
        return redirect()->route('admin.tellers.index')->with('info', 'Reporte de votos se actualizó con Éxito');
    }

}
