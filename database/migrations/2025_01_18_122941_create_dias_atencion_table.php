<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dias_atencion', function (Blueprint $table) {
            $table->id(); // Define el ID principal de la tabla
            $table->foreignId('medico_id')->constrained('medicos')->onDelete('cascade'); // Clave foránea
            $table->string('dia');
            $table->time('horario_inicio');
            $table->time('horario_fin');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dias_atencion');
    }
};
