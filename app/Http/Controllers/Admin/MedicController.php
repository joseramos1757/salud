<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\User;
use App\Models\Especialidad;
use RealRashid\SweetAlert\Facades\Alert;
class MedicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medic=Medico::all();
        return view('admin.medico.index', compact('medic'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('id', 'desc')->pluck('name', 'id');
        $especialidades = Especialidad::all();
    
        return view('admin.medico.create', compact('users', 'especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request-> validate([
            'ci'=>'required|numeric',
            'nombre'=>'required',
            'paterno'=>'required',
            'materno'=>'nullable',
            'celular'=> ['required','numeric','between:60000000,79999999'],
            'especialidad'=>'required',
            'fechanac'=>'required',
            'direccion'=>'required',
            'user_id'=>'required | unique:medicos',
        ]);

        $medicData=[
            'ci'=>$request->input('ci'),
            'nombre'=>strtoupper($request->input('nombre')),
            'paterno'=>strtoupper($request->input('paterno')),
            'materno'=>strtoupper($request->input('materno')),
            'celular'=>$request->input('celular'),
            'especialidad'=> $request->input('especialidad'),
            'fechanac'=>$request->input('fechanac'),
            'direccion'=>strtoupper($request->input('direccion')),
            'user_id'=>$request->input('user_id'),
        ];
        //sirve para mostrar los objetos que se estan enviando
        //return $request -> all();
        $medic = Medico::create($medicData);
  
            // Asociar la especialidad seleccionada
    $especialidadId = $request->input('especialidad');
    $medic->especialidads()->attach($especialidadId);
    $especialidadId = $request->input('especialidad');
               // Mostrar SweetAlert success después de crear el paciente
               Alert::success('Éxito', 'Paciente registrado correctamente');
        return redirect()->route('admin.medics.edit',$medic)->with('success', 'Médico registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medico $medic)
    {
        return view('admin.medico.show',compact('medic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medic)
    {
        $especialidades = Especialidad::all();
        return view('admin.medico.edit', compact('medic', 'especialidades'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medico $medic)
    {
        $request->validate([
            'ci' => 'required|numeric',
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'nullable',
            'celular' => ['required', 'numeric', 'between:60000000,79999999'],
            'especialidad' => 'required',
            'fechanac' => 'required',
            'direccion' => 'required',
        ]);

        $medicData=[
            'ci'=>$request->input('ci'),
            'nombre'=>strtoupper($request->input('nombre')),
            'paterno'=>strtoupper($request->input('paterno')),
            'materno'=>strtoupper($request->input('materno')),
            'celular'=>$request->input('celular'),
            'especialidad'=> $request->input('especialidad'),
            'fechanac'=>$request->input('fechanac'),
            'direccion'=>strtoupper($request->input('direccion')),
        ];
        //sirve para mostrar los objetos que se estan enviando
        //return $request -> all();
        $medic ->update($medicData);
        $especialidadId = $request->input('especialidad');
        $medic->especialidads()->attach($especialidadId);
        $especialidadId = $request->input('especialidad');

                 // Mostrar SweetAlert success después de crear el paciente
                 Alert::success('Éxito', 'Paciente actualizado correctamente');
        return redirect()->route('admin.medics.index');
   

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medic)
    {
            // Eliminar el médico
    $medic->delete();

    // Redireccionar a la lista de médicos con un mensaje de éxito
    return redirect()->route('admin.medics.index');
    }
    public function guardarEspecialidad(Request $request, $idMedico)
    {
        $medico = Medico::find($idMedico);
        $especialidadId = $request->input('especialidad');
    
        $medico->especialidades()->attach($especialidadId);

    // Resto de la lógica
    }
    public function obtenerMedicos()
    {
        $medicos = Medico::all(); // Obtener todos los médicos, ajusta según tu lógica
            // Imprimir los datos para verificar
    dd($medicos);
        return response()->json($medicos);
    }
}
