<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PacientesSeeder extends Seeder
{
    public function run()
    {
        DB::table('pacientes')->insert([
            [
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'email' => 'juan.perez@example.com',
                'telefono' => '123-456-7890',
                'direccion' => 'Calle Falsa 123, Ciudad de Ejemplo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'María',
                'apellido' => 'González',
                'email' => 'maria.gonzalez@example.com',
                'telefono' => '987-654-3210',
                'direccion' => 'Avenida Siempreviva 742, Ciudad de Prueba',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Ramírez',
                'email' => 'carlos.ramirez@example.com',
                'telefono' => '555-123-4567',
                'direccion' => 'Boulevard Central 456, Metropolis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}