<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recepcionista;
use Illuminate\Http\Request;
use App\Models\User;

class RecepcionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receptionist =Recepcionista::all();
        return view('admin.recepcionista.index',compact('receptionist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('id', 'desc')->pluck('name','id');  
        return view('admin.recepcionista.create',compact('users'));
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
            'fechanac'=>'required',
            'direccion'=>'required',
            'user_id'=>'required | unique:medicos',

        ]);
        $RecepcionistData=[
            'ci'=>$request->input('ci'),
            'nombre'=>strtoupper($request->input('nombre')),
            'paterno'=>strtoupper($request->input('paterno')),
            'materno'=>strtoupper($request->input('materno')),
            'celular'=>$request->input('celular'),
            'fechanac'=>$request->input('fechanac'),
            'direccion'=>strtoupper($request->input('direccion')),
            'user_id'=>$request->input('user_id'),
        ];
        //sirve para mostrar los objetos que se estan enviando
        //return $request -> all();
        $Receptionist = Recepcionista::create($RecepcionistData);
        return redirect()->route('admin.receptionists.edit',$Receptionist);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $receptionist)
    {
        return view('admin.recepcionista.show',compact('receptionist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recepcionista $receptionist)
    {
        return view('admin.recepcionista.edit',compact('receptionist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recepcionista $receptionist)
    {
        $request-> validate([
            'ci'=>'required|numeric',
            'nombre'=>'required',
            'paterno'=>'required',
            'materno'=>'nullable',
            'celular'=> ['required','numeric','between:60000000,79999999'],
            'fechanac'=>'required',
            'direccion'=>'required',

        ]);
        $RecepcionistData=[
            'ci'=>$request->input('ci'),
            'nombre'=>strtoupper($request->input('nombre')),
            'paterno'=>strtoupper($request->input('paterno')),
            'materno'=>strtoupper($request->input('materno')),
            'celular'=>$request->input('celular'),
            'fechanac'=>$request->input('fechanac'),
            'direccion'=>strtoupper($request->input('direccion')),
        ];
        //sirve para mostrar los objetos que se estan enviando
        //return $request -> all();
        $receptionist -> update($RecepcionistData);
        return redirect()->route('admin.receptionists.edit',$receptionist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recepcionista $receptionist)
    {
            // Eliminar el médico
    $receptionist->delete();

    // Redireccionar a la lista de médicos con un mensaje de éxito
    return redirect()->route('admin.receptionists.index');
    }
}
