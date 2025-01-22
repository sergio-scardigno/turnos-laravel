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
        // Obtener los turnos disponibles para el médico seleccionado
        $turnos = Turno::where('id_medico', $medicoId)
            ->where('estado', 'disponible')
            ->select('id', 'hora_turno', 'estado', 'tipo_turno')
            ->get();

        // Devolver los turnos como JSON
        return response()->json($turnos);
    }

}
