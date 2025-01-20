@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-white text-center mt-3">
        <h3 class="text-xl font-bold mb-4">Días de Atención de {{ $medico->nombre }}</h3>

        <!-- Mostrar días de atención -->
        <ul class="list-none p-0">
            @foreach($diasAtencion as $dia)
                <li class="mb-2">
                    {{ ucfirst($dia->dia) }}:
                    {{ \Carbon\Carbon::parse($dia->horario_inicio)->format('H:i') }} -
                    {{ \Carbon\Carbon::parse($dia->horario_fin)->format('H:i') }}
                </li>
            @endforeach
        </ul>

        <!-- Mostrar vacaciones -->
        <h3 class="text-xl font-bold mt-6 mb-4">Vacaciones Programadas</h3>
        <ul class="list-none p-0">
            @foreach($medico->vacaciones as $vacacion)
                <li class="mb-2">
                    Desde {{ \Carbon\Carbon::parse($vacacion->inicio)->format('d-m-Y') }} hasta {{ \Carbon\Carbon::parse($vacacion->fin)->format('d-m-Y') }}
                </li>
            @endforeach
        </ul>
    </div>


@endsection



