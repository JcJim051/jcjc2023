<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Puestos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


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
                            $municipios = explode(',', $municipio);
                            $sellers = Seller::whereIn('codmun', $municipios)->get();
                        }
                } else {
                    if ($role == 2) {
                        $sellers = Seller::where('codescru' , $escrutador)->get();
                    } else {

                        if ($role == 3) {
                            $puestos = array_filter(explode(',', $coordinador));
                            $sellers = Seller::whereIn('codcor', $puestos)->get();
                           
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
        $pdfUrl = null;
        if ($superuser->pdf) {
            $pdfUrl = Storage::disk('s3')->temporaryUrl(
                $superuser->pdf,
                now()->addMinutes(10) // enlace válido 10 minutos
            );
        }
        $puestos= Puestos::all();
        return view('admin.superusers.edit', compact('superuser', 'puestos', 'pdfUrl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Seller $superuser)
    // {
        
    
        
    //    if ($superuser->pdf == null) {
    //         $request->validate([
    //             'email' => [
    //                 'nullable',
    //                 Rule::unique('sellers')->ignore($superuser->id)->whereNotNull('email'),
    //             ],
    //             'cedula' => [
    //                 'nullable',
    //                 Rule::unique('sellers')->ignore($superuser->id)->whereNotNull('cedula'),
    //             ],
    //             'pdf' => 'required',
                
                         
    //         ]);
    //     } else {
    //             $request->validate([
    //             'email' => [
    //                 'nullable',
    //                 Rule::unique('sellers')->ignore($superuser->id)->whereNotNull('email'),
    //             ],
    //             'cedula' => [
    //                 'nullable',
    //                 Rule::unique('sellers')->ignore($superuser->id)->whereNotNull('cedula'),
    //             ],
                     
    //         ]);
    //     }
        
    //     if($request->hasfile('pdf')){

    //     $superuser['pdf']= $request->file('pdf')->getClientOriginalName();
    //     $request->file('pdf');

    //     $superuser['pdf']= $request->file('pdf')->store('/cedulas-pdf');


    //     }

    //         $superuser->update($request->all());

    //         if ($request->statusani == null  & $request->statusrec == null & $request->statusasistencia == null & $request->modificadopor_pmu == null)  {
    //             return redirect()->route('admin.superusers.index', $superuser)->with('info', ' Testigo actualizado con exito');
    //         } else {
    //             if ($request->statusrec == null & $request->statusasistencia == null  & $request->modificadopor_pmu == null) {
    //                 return redirect()->route('admin.ani.index', $superuser)->with('info', ' Validación Ani Guardada con Exito');
    //             } else {
    //                 if ($request->statusasistencia <> null  & $request->modificadopor_pmu == null) {
    //                     return redirect()->route('admin.posesion.index', $superuser)->with('info', 'Reporte de asistencia Guardado con Exito');
    //                 } else {
    //                     if ($request->modificadopor_pmu <> null) {
    //                         return redirect()->route('admin.pmu.index', $superuser)->with('info', 'Correccion mesa de crisis, reportada con exito');
    //                     } else {
    //                         return redirect()->route('admin.revision.index', $superuser)->with('info', 'Revisión E24 Guardada con Exito');
    //                     }
    //                 }
    //             }
    //         }
            

       
    // }

 

    public function update(Request $request, Seller $superuser)
    {
        $rules = [
            'email' => [
                'nullable',
                Rule::unique('sellers')->ignore($superuser->id),
            ],
            'cedula' => [
                'nullable',
                Rule::unique('sellers')->ignore($superuser->id),
            ],
            'nombre'    => 'required|string|max:255',
            'telefono'  => 'required|string|max:50',
            'dondevota' => 'required|string|max:255',
            'status'    => 'nullable|string|max:255',
            'statusani' => 'nullable|string|max:255',
            'observacion' => 'nullable|string|max:255',
        ];
        
        // 🔹 Validación del PDF (2 MB máximo)
        if ($superuser->pdf === null) {
            $rules['pdf'] = 'required|file|mimes:pdf|max:2048';
        } else {
            $rules['pdf'] = 'nullable|file|mimes:pdf|max:2048';
        }
        
        // 🔹 Mensajes personalizados
        $messages = [
            'pdf.required' => 'Debe adjuntar el documento en formato PDF.',
            'pdf.file'     => 'El archivo cargado no es válido.',
            'pdf.mimes'    => 'El archivo debe estar en formato PDF.',
            'pdf.max'      => 'El archivo PDF no puede pesar más de 2 MB.',
        ];
        // dd([
        //     'hasFile_pdf' => $request->hasFile('pdf'),
        //     'file_in_request' => $request->file('pdf'),
        //     'all_files' => $request->allFiles(),
        //     'post_max_size' => ini_get('post_max_size'),
        //     'upload_max_filesize' => ini_get('upload_max_filesize'),
        // ]);
        // Ejecutar validación
        $validated = $request->validate($rules, $messages);

        if ($request->hasFile('pdf')) {

            $file = $request->file('pdf');
        
            // 🛑 1. Verificar que el archivo realmente es válido
            if (!$file->isValid()) {
                return back()->withErrors(['pdf' => 'Error al subir el archivo. Intente nuevamente.']);
            }
        
            // 🧠 2. Validar MIME real (no confiar en la extensión)
            $mime = $file->getMimeType();
            if ($mime !== 'application/pdf') {
                return back()->withErrors(['pdf' => 'El archivo debe ser un PDF válido.']);
            }
        
            // 📏 3. Validar tamaño real (extra seguridad)
            if ($file->getSize() > 2 * 1024 * 1024) {
                return back()->withErrors(['pdf' => 'El PDF no puede superar los 2 MB.']);
            }
        
            // 🔎 4. Obtener extensión REAL basada en contenido
            $extension = $file->guessExtension() ?: 'pdf';
        
            // 🧼 5. Obtener cédula segura desde la BD (nunca del request)
            $cedula = preg_replace('/[^0-9]/', '', (string) $superuser->cedula);
        
            if (empty($cedula)) {
                return back()->withErrors(['pdf' => 'No se pudo determinar la cédula del usuario.']);
            }
        
            // 🆔 6. Generar nombre único para evitar sobreescrituras
            $nombreArchivo = $cedula . '_' . now()->timestamp . '_' . uniqid() . '.' . $extension;
        
            // ☁️ 7. Subir a S3
            $path = Storage::disk('s3')->putFileAs('cedulas-pdf', $file, $nombreArchivo);
        
            if (!$path) {
                return back()->withErrors(['pdf' => 'No se pudo guardar el archivo. Intente nuevamente.']);
            }
        
            // 🗑 8. Borrar PDF anterior solo después de subir el nuevo correctamente
            if ($superuser->pdf && Storage::disk('s3')->exists($superuser->pdf)) {
                Storage::disk('s3')->delete($superuser->pdf);
            }
        
            // 💾 9. Guardar ruta final
            $superuser->pdf = $path;
        }
        
            // Actualizar otros campos validados
            $superuser->fill($validated); // llena los demás campos
            $superuser->save(); // guarda todo incluido PDF

       
        // 🔹 Redirecciones (lógica intacta, solo ordenada)
        if (
            $request->statusani === null &&
            $request->statusrec === null &&
            $request->statusasistencia === null &&
            $request->modificadopor_pmu === null
        ) {
            return redirect()
                ->route('admin.superusers.index')
                ->with('info', 'Testigo actualizado con éxito');
        }

        if (
            $request->statusrec === null &&
            $request->statusasistencia === null &&
            $request->modificadopor_pmu === null
        ) {
            return redirect()
                ->route('admin.ani.index')
                ->with('info', 'Validación ANI guardada con éxito');
        }

        if ($request->statusasistencia !== null && $request->modificadopor_pmu === null) {
            return redirect()
                ->route('admin.posesion.index')
                ->with('info', 'Reporte de asistencia guardado con éxito');
        }

        if ($request->modificadopor_pmu !== null) {
            return redirect()
                ->route('admin.pmu.index')
                ->with('info', 'Corrección PMU reportada con éxito');
        }

        return redirect()
            ->route('admin.revision.index')
            ->with('info', 'Revisión E24 guardada con éxito');

           
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
