<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\User;
class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrators =Administrator::all();
        return view('admin.administrator.index',compact('administrators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //se orena en descendente los datos para el select 
        $users = User::orderBy('id', 'desc')->pluck('name','id');  
        return view('admin.administrator.create',compact('users'));
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
        $AdministratorData=[
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
        $Administrator = Administrator::create($AdministratorData);
        session()->flash('swal',[
            'icon'=>'sucess',
            'tittle'=>'¡Bien Hecho!',
            'text'=>'El administrador se creo correctamente',     

        ]);
        return redirect()->route('admin.administrators.edit',$Administrator);
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrator $administrator)
    {
        return view('admin.administrator.show',compact('administrator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrator $administrator)
    {

        return view('admin.administrator.edit', compact('administrator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Administrator $administrator)
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
        $AdministratorData=[
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
        $administrator -> update($AdministratorData);
        return redirect()->route('admin.administrators.edit',$administrator);
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrator $administrator)
    {
        //
    }
    
}
