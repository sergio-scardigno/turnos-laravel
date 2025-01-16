<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $table = 'turnos'; // Nombre de la tabla (opcional si sigue la convención)

    /**
     * Los atributos que son asignables en masa.
     */
    protected $fillable = [
        'id_medico',
        'id_paciente',
        'hora_turno',
        'estado',
        'asistencia_confirmada',
        'atendido',
        'cobro_realizado',
        'monto_cobrado',
        'monto_medico',
        'tipo_turno',
        'duracion_sobreturno',
        'motivo_sobreturno',
    ];

    /**
     * Relación con el modelo Medico.
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico');
    }

    /**
     * Relación con el modelo Paciente.
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}
