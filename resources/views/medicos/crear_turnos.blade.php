@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Turnos Disponibles</h1>


        <form action="#" method="POST">
            @csrf

            <div class="mb-3">
                <label for="dias" class="form-label">Días de Atención</label>
                <select name="dias[]" id="dias" class="form-select" multiple required>
                    <option value="" disabled selected>Seleccione los días</option>
                    @foreach ($medico->diasAtencion as $dia)
                        <option value="{{ $dia->id }}" data-hora_inicio="{{ $dia->horario_inicio }}" data-hora_fin="{{ $dia->horario_fin }}">
                            {{ ucfirst($dia->dia) }} - {{ $dia->horario_inicio }} a {{ $dia->horario_fin }}
                        </option>
                    @endforeach
                </select>
                @error('dias')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div id="turnosDisponibles" class="mb-3">
                <!-- Aquí se agregarán los turnos disponibles -->
            </div>

            <button type="submit" class="btn btn-primary mt-3">Crear Turnos Disponibles</button>
        </form>

        <script>
            document.getElementById('dias').addEventListener('change', function() {
                // Limpiar los turnos previos
                const turnosDisponiblesDiv = document.getElementById('turnosDisponibles');
                turnosDisponiblesDiv.innerHTML = '';

                // Recorrer los días seleccionados
                Array.from(this.selectedOptions).forEach(option => {
                    const horaInicio = option.getAttribute('data-hora_inicio');
                    const horaFin = option.getAttribute('data-hora_fin');

                    // Obtener la duración del turno (en minutos) del médico
                    const duracionTurno = {{ $medico->duracion_turno }}; // Duración en minutos

                    // Calcular las horas disponibles entre la hora de inicio y la hora de fin
                    const start = new Date(`1970-01-01T${horaInicio}`);
                    const end = new Date(`1970-01-01T${horaFin}`);
                    let currentTime = start;

                    // Crear los turnos disponibles según la duración del turno
                    while (currentTime < end) {
                        const nextTime = new Date(currentTime.getTime() + duracionTurno * 60000); // Añadir duración del turno en minutos

                        // Crear la opción de turno
                        const turnoDiv = document.createElement('div');
                        turnoDiv.classList.add('turno-item');

                        // Crear la información del turno
                        const turnoLabel = document.createElement('span');
                        turnoLabel.textContent = `${currentTime.toTimeString().substr(0, 5)} - ${nextTime.toTimeString().substr(0, 5)}`;

                        // Crear el botón para generar el turno
                        const botonGenerar = document.createElement('button');
                        botonGenerar.type = 'button';
                        botonGenerar.classList.add('btn', 'btn-success', 'btn-sm', 'ms-2');
                        botonGenerar.textContent = 'Generar Turno';
                        botonGenerar.onclick = function() {
                            generarTurno(currentTime.toTimeString().substr(0, 5), nextTime.toTimeString().substr(0, 5));
                        };

                        // Agregar el turno y el botón a la interfaz
                        turnoDiv.appendChild(turnoLabel);
                        turnoDiv.appendChild(botonGenerar);
                        turnosDisponiblesDiv.appendChild(turnoDiv);

                        // Avanzar al siguiente turno
                        currentTime = nextTime;
                    }
                });
            });

            // Función para generar el turno (simulando con un console log)
            function generarTurno(horaInicio, horaFin) {
                // Aquí, deberías enviar la información al servidor para guardar el turno
                console.log(`Generando turno: ${horaInicio} - ${horaFin}`);

                // Puedes hacer una petición AJAX aquí para enviar los datos al servidor y guardar el turno
                // Ejemplo de uso con Fetch:
                /*
                fetch('/ruta/a/guardar-turno', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                hora_inicio: horaInicio,
                hora_fin: horaFin
            })
        })
        .then(response => response.json())
        .then(data => {
            // Procesar la respuesta
            console.log(data);
        })
        .catch(error => console.error('Error:', error));
        */
            }
        </script>


    </div>



@endsection
