@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    @php $puestosHeader = auth()->user()->puestos(); @endphp

    @if($puestosHeader && $puestosHeader->count())
        @foreach($puestosHeader as $p)
            <span class="badge badge-info">{{ $p->puesto }}</span>
        @endforeach
    @else
        <span class="text-muted">Sin puesto asignado</span>
    @endif
@stop


@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{ session('info') }}</strong>
</div>
@endif

<div class="card">
    <div class="text-center card-header text-success">
        <h5>{{ $rol }}</h5>
    </div>

    <div class="text-center card-body size-14">

        {{-- ===================== DELEGADO ===================== --}}
        @if ($rol == "Delegado")

            @php
                $puestos = collect();
                if(Auth::user()->codpuesto){
                    $ids = explode(',', Auth::user()->codpuesto);
                    $puestos = \App\Models\Puestos::whereIn('codpuesto', $ids)->get();
                }
            @endphp

            <div class="text-info">
                <h4>Tu rol</h4>
                <h5>Delegado de puesto de votación</h5>

                @if($puestos->count())
                    @foreach($puestos as $p)
                        <div>🗳️ {{ $p->nombre }} — {{ $p->municipio }}</div>
                    @endforeach
                    <br>
                    <strong>Códigos de Puesto:</strong> {{ Auth::user()->codpuesto }}
                @else
                    <div class="text-muted">No tienes puesto asignado</div>
                @endif
            </div>

            <div class="mt-3 row">
                <div class="col-3">
                    <div class="small-box bg-gradient-warning">
                        <div class="inner">
                            <h3>{{ $tmc }}</h3>
                            <p>Total Testigos</p>
                            @if (Auth::user()->candidatos == 103)
                            
                            @else
                                <h4>{{ $tevidencia }}</h4>
                                <p>Total Remanentes</p>  
                            @endif
                            
                        </div>
                        <div class="icon"><i class="fas fa-store-alt"></i></div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $tde }}</h3>
                            <p>Datos Enviados</p>
                            <h4>{{ $tevidencia_enviada }}</h4>
                            <p>Evidencias Enviadas</p>
                        </div>
                        <div class="icon"><i class="fas fa-street-view"></i></div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="small-box bg-gradient-danger">
                        <div class="inner">
                            <h3>{{ $tmc - $tde }}</h3>
                            <p>Datos por enviar</p>
                            <h4>{{ $tevidencia - $tevidencia_enviada }}</h4>
                            <p>Evidencias por enviar</p>
                        </div>
                        <div class="icon"><i class="fas fa-user-slash"></i></div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3>{{ $tmc ? round($tde/$tmc*100,1) : 0 }}%</h3>
                            <p>% de mesas reportadas</p>
                            <h4>{{ $tevidencia ? round($tevidencia_enviada/$tevidencia*100,1) : 0 }}%</h4>
                            <p>% evidencias enviadas</p>
                        </div>
                        <div class="icon"><i class="fas fa-user-check"></i></div>
                    </div>
                </div>
            </div>

        {{-- ===================== ESCRUTADOR ===================== --}}
        @elseif ($rol == "Esctrutador")

            <div class="text-info">
                <h5>Tu rol</h5>
                @if (Auth::user()->mun == 1)
                    <p>Escrutador comisión Auxiliar {{ Auth::user()->codzon }}</p>
                @else
                    <p>Escrutador Municipal de {{ $mun->municipio }} <br>Código: {{ Auth::user()->codzon }}</p>
                @endif
            </div>

            {{-- (Aquí dejas tus cajas de estadísticas tal cual estaban, no afectaban el error) --}}

        {{-- ===================== OTROS ROLES ===================== --}}
        @else
            <div class="text-muted">
                Panel de control para el rol {{ $rol }}
            </div>
        @endif

    </div>

    <div class="text-center card-footer text-muted">
        <h6>TestiApp todos los derechos reservados</h6>
    </div>
</div>
@stop


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
@if(isset($data))
const ctx3 = document.getElementById('zonas')?.getContext('2d');
if(ctx3){
    new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: [{!! $data->pluck('codescru')->map(fn($c)=>"'$c'")->implode(',') !!}],
            datasets: [
                {
                    label: 'Acreditados',
                    backgroundColor: 'green',
                    data: [{!! $dat->pluck('T')->implode(',') !!}]
                },
                {
                    label: 'Pendientes',
                    backgroundColor: 'red',
                    data: [{!! $not->pluck('F')->implode(',') !!}]
                }
            ]
        }
    });
}
@endif
</script>
@stop
