<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paciente\PacienteController;
use App\Http\Controllers\ReconsultaController;
use App\Http\Controllers\Admin\MedicController;
use App\Livewire\ShowPacients;
use Livewire\Livewire;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Livewire::component('show-pacients', ShowPacients::class);
});

Route::get('pacients',[PacienteController::class,'index'])->name('paciente.home');
Route::resource('pacients', PacienteController::class)->names('paciente.pacients')->middleware(['can:ACCESO A PACIENTES']);


Route::get('/reconsulta/{paciente}', [ReconsultaController::class, 'mostrarFormulario'])->name('reconsulta.formulario');
Route::post('/reconsulta/{paciente}', [ReconsultaController::class, 'guardarReconsulta'])->name('reconsulta.guardar');
Route::post('/medicos/{idMedico}/guardar-especialidad', [MedicController::class, 'guardarEspecialidad']);
Route::get('/obtener-medicos/{especialidad}', [ReconsultaController::class, 'obtenerMedicos'])->name('obtener-medicos');
require __DIR__.'/auth.php';

