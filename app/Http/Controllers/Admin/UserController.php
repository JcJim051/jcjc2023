<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Puestos;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // traer roles de Spatie para el select
        $municipios = Puestos::select('mun')->distinct()->orderBy('mun')->get();
        return view('admin.users.create', compact('roles', 'municipios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role'     => 'required' // aquí guardamos el id o nombre del rol
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role, // guardamos en tabla users
            'codzon'     => $request->codzon, 
            'codpuesto'     => $request->codpuesto, 
            'mun'     => $request->mun, 
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,'.$user->id,
            'role'      => 'required',
            'status'    => 'required|in:0,1',
            // otros campos si quieres...
        ]);
        
        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'role'      => $request->role,
            'codzon'    => $request->codzon,
            'codpuesto' => $request->codpuesto,
            'mun'       => $request->mun,
            'status'    => $request->status,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
    }

    public function showImportForm()
{
    return view('admin.users.import');
}


public function import(Request $request)
{
    // 1️⃣ Validar archivo
    $request->validate([
        'csv' => 'required|file|mimes:csv,txt|max:2048',
    ]);

    // 2️⃣ Obtener archivo
    $file = $request->file('csv');
    if (!$file) {
        return redirect()->back()->with('error', 'No se ha subido ningún archivo.');
    }

    // 3️⃣ Leer CSV (separador ;)
    $data = array_map(function($line) {
        return str_getcsv($line, ';');
    }, file($file->getRealPath()));

    // 4️⃣ Recorrer filas
    foreach ($data as $index => $row) {
        if ($index === 0) continue; // Saltar cabecera

        // Validar que tenga al menos 9 columnas (id incluido)
        if (count($row) < 9) continue;

        $id         = (int) trim($row[0]);
        $name       = trim($row[1]);
        $email      = trim($row[2]);
        $password   = trim($row[3]);
        $role       = intval($row[4]);
        $status     = intval($row[5]);
        $codzon     = str_pad(trim($row[6]), 3, '0', STR_PAD_LEFT);
        $codpuesto  = str_pad(trim($row[7]), 3, '0', STR_PAD_LEFT);
        $mun        = intval($row[8]);

        // 5️⃣ Buscar usuario por ID
        $user = User::find($id);

        if ($user) {
            // 🔄 Actualizar datos aunque el correo esté repetido
            $user->name = $name;
            $user->email = $email;
            if (!empty($password)) {
                $user->password = \Hash::make($password);
            }
            $user->role = $role;
            $user->status = $status;
            $user->codzon = $codzon;
            $user->codpuesto = $codpuesto;
            $user->mun = $mun;
            $user->save();
        } else {
            // 📌 Validar que el correo no exista antes de crear
            if (User::where('email', $email)->exists()) {
                // Saltar creación para evitar duplicados
                continue;
            }

            // Crear con ID personalizado
            $newUser = new User();
            $newUser->incrementing = false; // evitar autoincremento
            $newUser->id = $id;
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->password = \Hash::make($password ?: '123456');
            $newUser->role = $role;
            $newUser->status = $status;
            $newUser->codzon = $codzon;
            $newUser->codpuesto = $codpuesto;
            $newUser->mun = $mun;
            $newUser->save();
        }
    }

    return redirect()->route('admin.users.index')
        ->with('success', 'Usuarios actualizados masivamente de forma correcta');
}




    public function downloadTemplate()
{
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="usuarios_template.csv"',
    ];

    $columns = ['id','name', 'email', 'password', 'role', 'status', 'codzon', 'codpuesto', 'mun'];

    $callback = function() use ($columns) {
        $file = fopen('php://output', 'w');

        // Escribir cabeceras
        fputcsv($file, $columns, ';');

        // Ejemplo 1: Administrador en Villavicencio (mun 1)
        fputcsv($file, [
            '1',
            'Juan Pérez',
            'juan@example.com',
            'secret123', // Se encripta en import
            1,           // Rol 1: Administrador
            1,           // Activo
            '"001"', // codzon forzado como texto
            '"010"',
            1            // Villavicencio
        ], ';');

        // Ejemplo 2: Coordinador en Municipios (mun 0)
        fputcsv($file, [
            '2',
            'María Gómez',
            'maria@example.com',
            'secret123',
            3,           // Rol 3: Coordinador
            1,
            "'002'",
            "'020'",
            0            // Municipios
        ], ';');

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}
 

}
