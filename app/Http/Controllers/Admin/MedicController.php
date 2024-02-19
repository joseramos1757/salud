<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\User;
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
        $users = User::orderBy('id', 'desc')->pluck('name','id');  
        return view('admin.medico.create',compact('users'));
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
            'materno'=>'',
            'celular'=>'required',
            'especialidad'=>'required',
            'fechanac'=>'required',
            'user_id'=>'required | unique:medicos',
        ]);
        //sirve para mostrar los objetos que se estan enviando
        //return $request -> all();
        $medic = Medico::create($request->all());
        return redirect()->route('admin.medics.edit',$medic);
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
        return view('admin.medico.edit',compact('medic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medico $medic)
    {
        $request-> validate([
            'ci'=>'required|numeric',
            'nombre'=>'required',
            'paterno'=>'required',
            'materno'=>'',
            'celular'=>'required',
            'especialidad'=>'required',
            'fechanac'=>'required'
        ]);
        $medic -> update($request->all());
        return redirect()->route('admin.medics.index',$medic);
   

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function obtenerMedicos()
    {
        $medicos = Medico::all(); // Obtener todos los médicos, ajusta según tu lógica
            // Imprimir los datos para verificar
    dd($medicos);
        return response()->json($medicos);
    }
}
