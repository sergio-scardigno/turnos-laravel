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


}
