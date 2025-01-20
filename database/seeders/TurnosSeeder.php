<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TurnosSeeder extends Seeder
{
    public function run()
    {
        DB::table('turnos')->insert([
            [
                'id_medico' => 1,  // Asume que existe un médico con ID 1
                'id_paciente' => 1,  // Asume que existe un paciente con ID 1
                'hora_turno' => Carbon::now()->addDays(1),
                'estado' => 'reservado',
                'asistencia_confirmada' => false,
                'atendido' => false,
                'cobro_realizado' => false,
                'monto_cobrado' => 1000.00,
                'monto_medico' => 700.00,
                'tipo_turno' => 'regular',
                'duracion_sobreturno' => null,
                'motivo_sobreturno' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_medico' => 2,
                'id_paciente' => null,
                'hora_turno' => Carbon::now()->addDays(2)->setTime(10, 30),
                'estado' => 'disponible',
                'asistencia_confirmada' => false,
                'atendido' => false,
                'cobro_realizado' => false,
                'monto_cobrado' => null,
                'monto_medico' => null,
                'tipo_turno' => 'regular',
                'duracion_sobreturno' => null,
                'motivo_sobreturno' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_medico' => 1,
                'id_paciente' => 3,
                'hora_turno' => Carbon::now()->addDays(3)->setTime(15, 0),
                'estado' => 'cancelado',
                'asistencia_confirmada' => false,
                'atendido' => false,
                'cobro_realizado' => true,
                'monto_cobrado' => 1200.00,
                'monto_medico' => 800.00,
                'tipo_turno' => 'sobreturno',
                'duracion_sobreturno' => 30,
                'motivo_sobreturno' => 'Emergencia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
