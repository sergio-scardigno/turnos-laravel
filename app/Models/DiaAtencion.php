<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaAtencion extends Model
{
    use HasFactory;

    protected $table = 'dias_atencion'; // Nombre correcto de la tabla


    protected $fillable = ['medico_id', 'dia', 'horario_inicio', 'horario_fin'];

    public function medico()
    {
        return $this->belongsTo(Medicos::class, 'medico_id');
    }
}
