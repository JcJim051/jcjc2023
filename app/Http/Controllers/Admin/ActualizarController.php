<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;



class ActualizarController extends Controller
{
    public function actualizarRegistros(Request $request) {
        $idDigits = $request->input('idDigits');
        $base64Image = $request->input('image'); // Obtener la imagen base64 desde la solicitud

        // Decodificar la imagen base64
        $imageData = base64_decode($base64Image);
        
        // Generar un nombre único para la imagen
        $imageName = uniqid() . '.jpg'; // Puedes usar otro formato según tus necesidades
        
        $resizedImage = Image::make($imageData)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        // Almacenar la imagen redimensionada
        $path = 'E14-qr/' . $imageName;
        Storage::put($path, (string) $resizedImage->encode());

        
        $seller = Seller::where('codigomesa', $idDigits)->first();
        
        
        if ($seller) {
            $seller->e14 = $path; // Ruta relativa en el disco "public"
            $seller->save();
            return response()->json(['message' => 'Imagen almacenada en el sistema de archivos y ruta guardada en la base de datos.']);
        }
            
    }

}
