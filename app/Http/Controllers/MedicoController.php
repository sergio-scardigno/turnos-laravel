<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use Carbon\Carbon;


class MedicoController extends Controller
{

    public function mostrarHorarios($id)
    {
        $medico = Medicos::with(['diasAtencion', 'vacaciones'])->findOrFail($id);

        $diasAtencion = $medico->diasAtencion;

        // Pasar los días de atención y las vacaciones a la vista
        return view('medicos.horarios', compact('medico', 'diasAtencion'));
    }

    public function crearTurnosDisponibles($id)
    {

        $medico = Medicos::with(['diasAtencion', 'vacaciones'])->findOrFail($id);

        $diasAtencion = $medico->diasAtencion;

        return view('medicos.crear_turnos', compact('medico', 'diasAtencion'));
    }

//    public function guardarTurnosDisponibles(Request $request)
//    {
//        // Validar la solicitud
//        $request->validate([
//            'dia' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo',
//            'horario_inicio' => 'required|date_format:H:i',
//            'horario_fin' => 'required|date_format:H:i|after:horario_inicio',
//        ]);
//
//        $medico = auth()->user();
//
//        // Verificar si el día pertenece a los días de atención del médico
//        $diaAtencion = $medico->diasAtencion()
//            ->where('dia', $request->dia)
//            ->first();
//
//        if (!$diaAtencion) {
//            return redirect()->back()->withErrors(['dia' => 'Este día no está dentro de sus días de atención.']);
//        }
//
//        // Crear turnos disponibles en el rango de tiempo
//        $inicio = Carbon::createFromFormat('H:i', $request->horario_inicio);
//        $fin = Carbon::createFromFormat('H:i', $request->horario_fin);
//
//        while ($inicio->lt($fin)) {
//            $turnoFin = $inicio->copy()->addMinutes(30); // Duración del turno (30 minutos)
//
//            if ($turnoFin->gt($fin)) {
//                break;
//            }
//
//            Turno::create([
//                'id_medico' => $medico->id,
//                'dia' => $request->dia,
//                'hora_turno' => $inicio->format('H:i'),
//                'estado' => 'disponible',
//            ]);
//
//            $inicio->addMinutes(30);
//        }
//
//        return redirect()->route('medicos.turnos')->with('success', 'Turnos creados exitosamente.');
//    }



}
