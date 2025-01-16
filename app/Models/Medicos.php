<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    use HasFactory;

    protected $table = 'medicos';
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

       
    protected $fillable = [
        'nombre',
        'especialidad',
        'horario_inicio',
        'horario_fin',
        'duracion_turno',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'horario_inicio' => 'datetime:H:i',
        'horario_fin' => 'datetime:H:i',
    ];
}
