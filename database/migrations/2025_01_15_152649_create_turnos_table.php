<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnosTable extends Migration
{
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_medico')->constrained('medicos')->onDelete('cascade');
            $table->foreignId('id_paciente')->nullable()->constrained('pacientes')->onDelete('set null');
            $table->dateTime('hora_turno');
            $table->enum('estado', ['disponible', 'reservado', 'cancelado']);
            $table->boolean('asistencia_confirmada')->default(false);
            $table->boolean('atendido')->default(false);
            $table->boolean('cobro_realizado')->default(false);
            $table->decimal('monto_cobrado', 10, 2)->nullable();
            $table->decimal('monto_medico', 10, 2)->nullable();
            $table->enum('tipo_turno', ['regular', 'sobreturno']);
            $table->integer('duracion_sobreturno')->nullable();
            $table->string('motivo_sobreturno')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('turnos');
    }
}

