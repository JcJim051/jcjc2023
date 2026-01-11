<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Administración')</title>

    {{-- Bootstrap y Font Awesome --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Estilo tipo Backpack --}}
    <style>
        body {
            background-color: #f4f5f7;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            padding-top: 1rem;
        }
        .sidebar a {
            color: #cfd8dc;
            display: block;
            padding: 0.7rem 1rem;
            border-radius: 4px;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
            text-decoration: none;
        }
        .topbar {
            background: #fff;
            padding: 0.5rem 1rem;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-wrapper {
            padding: 1.5rem;
        }
        .btn-primary {
            background-color: #3c8dbc;
            border-color: #367fa9;
        }
        table.table {
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
        }
    </style>

    @yield('css')
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        <div class="p-2 sidebar">
            <h5 class="mb-3 text-center text-white">Mi Panel</h5>
            <a href="#"><i class="fa fa-home"></i> Dashboard</a>
            <a href="#"><i class="fa fa-users"></i> Usuarios</a>
            <a href="#"><i class="fa fa-id-card"></i> Roles</a>
            <a href="#"><i class="fa fa-cogs"></i> Configuración</a>
        </div>

        {{-- Contenido principal --}}
        <div class="flex-grow-1">
            {{-- Topbar --}}
            <div class="topbar">
                <div>
                    <strong>@yield('title', 'Panel')</strong>
                </div>
                <div>
                    <i class="fa fa-user-circle"></i> {{ Auth::user()->name ?? 'Invitado' }}
                </div>
            </div>

            {{-- Contenido --}}
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    @yield('js')
</body>
</html>
