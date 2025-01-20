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
        Schema::create('vacaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medico_id')->constrained('medicos')->onDelete('cascade');
            $table->date('inicio'); // Fecha de inicio de las vacaciones
            $table->date('fin');    // Fecha de fin de las vacaciones
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacaciones');
    }
};
