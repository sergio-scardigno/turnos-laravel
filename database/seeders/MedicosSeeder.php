<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Medicos;  // Asegúrate de que este sea el nombre correcto del modelo

class MedicosSeeder extends Seeder
{
    public function run()
    {
        // Aquí se usa la clase correcta "Medico"
        Medicos::create([
            'nombre' => 'Dr. Ana Gómez',
            'especialidad' => 'Pediatría',
            'horario_inicio' => '09:00:00',
            'horario_fin' => '18:00:00',
            'duracion_turno' => 30,
        ]);
    }
}
