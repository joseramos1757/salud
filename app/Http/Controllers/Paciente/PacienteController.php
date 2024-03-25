<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Medico;



class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
           // Obtiene todos los pacientes ordenados por fecha de creación descendente
    $pacient = Paciente::orderBy('updated_at', 'desc')->get();
            // Verifica si se ha enviado un parámetro de búsqueda
    if ($request->has('carnet')) {
        // Realiza la búsqueda solo si se proporciona un carné
        $carnet = $request->input('carnet');
        $pacient = Paciente::where('ci', $carnet)->get();
    }

        // Verifica si no hay resultados de la búsqueda
        $message = (count($pacient) === 0 && $request->has('carnet'))
        ? 'NO EXISTE PACIENTE CON ESE NUMERO DE CARNET'
        : null;
        return view('paciente.pacients.index',compact('pacient','message'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paciente.pacients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                       // Obtener datos del formulario
    $requestData = $request->all();
    // Calcular la edad a partir de la fecha de nacimiento  
    $fechaNacimiento = Carbon::parse($requestData['fechanac']);
    $edad = $fechaNacimiento->diffInYears(Carbon::now());

    // Agregar la edad a los datos
    $requestData['edad'] = $edad;
        $request-> validate([
            'ci'=>'required|unique:pacientes|numeric',
            'nombre'=>'required',
            'paterno'=>'required',
            'materno'=>'nullable',
            'celular' => ['required','numeric','between:60000000,79999999'],
            //'edad'=>'required',
            'sexo'=>'required',
            'estadocivil'=>'required',
            'ocupacion'=>'required',
            'fechanac'=>'required',
            'direccion'=>'required',
            'observaciones'=>'nullable'

        ]);
          // Convertir a mayúsculas antes de guardar en la base de datos
    $pacientData = [
        'ci' => $request->input('ci'),
        'nombre' => strtoupper($request->input('nombre')),
        'paterno' => strtoupper($request->input('paterno')),
        'materno' => strtoupper($request->input('materno')),
        'celular' => $request->input('celular'),
        'edad' => $edad,
        'sexo' => $request->input('sexo'),
        'estadocivil' => $request->input('estadocivil'),
        'fechanac' =>  $request->input('fechanac'),
        'ocupacion' => strtoupper($request->input('ocupacion')),
        'direccion' => strtoupper($request->input('direccion')),
        'observaciones' => strtoupper($request->input('observaciones'))
    ];
        $pacient = Paciente::create($pacientData);
                // Mostrar SweetAlert success después de crear el paciente
                Alert::success('Éxito', 'Paciente registrado correctamente');

        
        return redirect()->route('paciente.pacients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($pacient)
    {
     
        return view('paciente.pacients.show',compact('pacient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $pacient)
    {
        return view('paciente.pacients.edit', compact('pacient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $pacient)
    {
            // Obtener datos del formulario
    $requestData = $request->all();
    // Calcular la edad a partir de la fecha de nacimiento  
    $fechaNacimiento = Carbon::parse($requestData['fechanac']);
    $edad = $fechaNacimiento->diffInYears(Carbon::now());

    // Agregar la edad a los datos
    $requestData['edad'] = $edad;
        
        $request->validate([
            'ci' => 'required|numeric|unique:pacientes,ci,' . $pacient->id,
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'nullable',
            'celular' => ['required','numeric','between:60000000,79999999'],
            //'edad' => 'required',
            'sexo' => 'required',
            'estadocivil' => 'required',
            'ocupacion' => 'required',
            'fechanac' => 'required',
            'direccion' => 'required',
            'observaciones' => 'nullable'
        ]);
    
       
            // Convertir a mayúsculas antes de guardar en la base de datos
            $pacientData = [
                'ci' => strtoupper($request->input('ci')),
                'nombre' => strtoupper($request->input('nombre')),
                'paterno' => strtoupper($request->input('paterno')),
                'materno' => strtoupper($request->input('materno')),
                'celular' => $request->input('celular'),
                'edad' => $edad,
                'sexo' => $request->input('sexo'),
                'estadocivil' => $request->input('estadocivil'),
                'fechanac' => $request->input('fechanac'),
                'direccion' => strtoupper($request->input('direccion')),
                'observaciones' => strtoupper($request->input('observaciones'))
            ];
            $pacient->update($pacientData);
                          // Mostrar SweetAlert success después de crear el paciente
            alert()->success('Éxito', 'Datos actualizados correctamente');
            return redirect()->route('paciente.pacients.index');

    
        }
    private function calcularEdad($fechaNacimiento)
    {
        $fechaNacimiento = new Carbon($fechaNacimiento);
        $hoy = Carbon::now();
        return $fechaNacimiento->diffInYears($hoy);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $pacient)
    {
            // Aquí puedes añadir la lógica para eliminar el registro
             // Por ejemplo:
             $pacient->delete();
             // Mostrar la alerta SweetAlert
             Alert::success('Elminado!', 'El Paciente ha sido eliminado correctamente');

             // Redirigir a la página de índice o a donde desees
             return redirect()->route('paciente.pacients.index');
    }
    
    public function asignarMedico(Request $request)
    {
    // Lógica para asignar médico al paciente
    $pacienteId = $request->input('paciente_id');
    $medicoId = $request->input('medico_id');

    // Realiza la asignación, por ejemplo, actualiza la base de datos
    // ...

    // Devuelve una respuesta (puedes ajustar según tus necesidades)
    return response()->json(['mensaje' => 'Asignación de médico exitosa']);
    }
}
