<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles=Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions=Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:roles,name'],
            'permissions'=>'nullable|array'
        ]);
    
        $rol = Role::create($request->all());
        Alert::success('¡Bien Hecho!', 'El rol se creó correctamente');
        $rol->permissions()->attach($request->permissions);
        return redirect()->route('admin.roles.edit', $rol);
    }
    
    public function show(Role $role)
    {
        return view('admin.roles.show',compact('role'));
    }

    public function edit(Role $role)
    {
        //esta recuperando los datos tickeados 
        $permissions = $role->permissions->pluck('id')->toArray();

        $permissions = Permission::all();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        //dd($request->all());
        $request->validate([
            'name' => ['required', 'unique:roles,name,'.$role->id],
            'permissions'=>'nullable|array'

        ]);
    
        $role->update($request->all());
        //accede al objeto role y la relacion entre roles y permisos en la tabla intermedia 
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit',$role);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        // Redireccionar a la lista de médicos con un mensaje de éxito
        return redirect()->route('admin.roles.index');
    }
}
