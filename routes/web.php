<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicoController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/turnos/{medicoId}', [HomeController::class, 'turnosDisponibles'])->name('turnos.calendario');

//Horarios medicos
Route::get('/medicos/{id}/horarios', [MedicoController::class, 'mostrarHorarios'])->name('medicos.horarios');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
