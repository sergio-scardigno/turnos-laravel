<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Medicos;
use App\Models\DiaAtencion;
use App\Models\Vacacion;

class MedicosSeeder extends Seeder
{
    public function run()
    {
        // Crear médico
        $medico = Medicos::create([
            'nombre' => 'Dr. Pérez',
            'especialidad' => 'Cardiología',
            'horario_inicio' => '09:00:00',
            'horario_fin' => '17:00:00',
            'duracion_turno' => 30,
        ]);

        // Agregar días de atención
        $medico->diasAtencion()->createMany([
            ['dia' => 'lunes', 'horario_inicio' => '09:00:00', 'horario_fin' => '13:00:00'],
            ['dia' => 'miércoles', 'horario_inicio' => '09:00:00', 'horario_fin' => '17:00:00'],
            ['dia' => 'viernes', 'horario_inicio' => '09:00:00', 'horario_fin' => '12:00:00'],
        ]);

        // Agregar vacaciones
        $medico->vacaciones()->create([
            'inicio' => '2025-01-01',
            'fin' => '2025-02-10',
        ]);

        // Crear otro médico como ejemplo
        $medico2 = Medicos::create([
            'nombre' => 'Dra. García',
            'especialidad' => 'Dermatología',
            'horario_inicio' => '10:00:00',
            'horario_fin' => '16:00:00',
            'duracion_turno' => 20,
        ]);

        $medico2->diasAtencion()->createMany([
            ['dia' => 'martes', 'horario_inicio' => '10:00:00', 'horario_fin' => '14:00:00'],
            ['dia' => 'jueves', 'horario_inicio' => '12:00:00', 'horario_fin' => '16:00:00'],
        ]);

        $medico2->vacaciones()->create([
            'inicio' => '2025-02-15',
            'fin' => '2025-03-01',
        ]);
    }

}
