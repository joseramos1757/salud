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
            'materno'=>'',
            'celular'=>'required',
            'fechanac'=>'required',
            'user_id'=>'required | unique:administrators',

        ]);
        //sirve para mostrar los objetos que se estan enviando
        //return $request -> all();
        $Receptionist = Recepcionista::create($request->all());
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
            'materno'=>'',
            'celular'=>'required',
            'fechanac'=>'required',

        ]);
        //sirve para mostrar los objetos que se estan enviando
        //return $request -> all();
        $receptionist -> update($request->all());
        return redirect()->route('admin.receptionists.edit',$receptionist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
