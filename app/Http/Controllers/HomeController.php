<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Turno; 
use App\Models\Medicos;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener todos los médicos
        $medicos = Medicos::all();

        // Obtiene los turnos disponibles
        $turnos = Turno::where('estado', 'disponible')->get();

        return view('welcome', compact('turnos', 'medicos'));

    }

    public function turnosDisponibles($medicoId)
    {
        // Verificar si el médico existe si es necesario (puedes agregar lógica si tienes un modelo Medico)
        // Medico::findOrFail($medicoId); // Descomentar si manejas la relación

        // Consulta para obtener turnos disponibles para el médico específico
        $turnos = Turno::where('id_medico', $medicoId)
            ->where('estado', 'disponible')
            ->select('id', 'hora_turno', 'estado', 'tipo_turno')
            ->get();

        return view('turnos.calendario', compact('turnos'));
    }
}


