<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:roles,name']
        ]);
    
        $rol = Role::create($request->all());
        Alert::success('¡Bien Hecho!', 'El rol se creó correctamente');
    
        return redirect()->route('admin.roles.edit', $rol);
    }
    
    public function show(Role $role)
    {
        return view('admin.roles.show',compact('role'));
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit',compact('role'));
    }

    public function update(Request $request, Role $role)
    {

    }

    public function destroy(Role $role)
    {

    }
}
