<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacacion extends Model
{
    use HasFactory;

    protected $table = 'vacaciones'; // Nombre correcto de la tabla


    protected $fillable = ['medico_id', 'inicio', 'fin'];

    public function medico()
    {
        return $this->belongsTo(Medicos::class, 'medico_id');
    }
}
