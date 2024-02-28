<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paciente\PacienteController;
use App\Http\Controllers\ReconsultaController;
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
});
Route::get('pacients',[PacienteController::class,'index'])->name('paciente.home');
Route::resource('pacients', PacienteController::class)->names('paciente.pacients');


Route::get('/reconsulta/{paciente}', [ReconsultaController::class, 'mostrarFormulario'])->name('reconsulta.formulario');
Route::post('/reconsulta/{paciente}', [ReconsultaController::class, 'guardarReconsulta'])->name('reconsulta.guardar');

require __DIR__.'/auth.php';

