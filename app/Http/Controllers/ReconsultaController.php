<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Paciente;

class ReconsultaController extends Controller
{
    public function mostrarFormulario(Paciente $paciente)
    {
        $medicos = Medico::all();
        return view('reconsulta.formulario', compact('paciente', 'medicos'));
    }

    public function guardarReconsulta(Request $request, Paciente $paciente)
    {
    // Validaciones y lógica de guardado del formulario...

    // Obtén el ID del médico seleccionado desde el formulario
    $medicoId = $request->input('medico');

    // Obtén el modelo del médico
    $medico = Medico::find($medicoId);

    // Asigna el médico al paciente utilizando el método sync
    // El segundo argumento es un array de atributos adicionales en la tabla pivot
    $paciente->medicos()->sync([$medico->id => ['created_at' => now(), 'updated_at' => now()]], false);

    // Redirecciona a la vista de pacientes después de guardar
    return redirect()->route('paciente.pacients.index')->with('success', 'Reconsulta guardada exitosamente.');
 }
}
