<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //para paginar datos
        $users = User::paginate();
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:users,name'],
            'email' => 'required', 
            'password'=>'required'
        ]);
        
     
        $user = User::create($request->all());
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
  
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'unique:users,name,'.$user->id], // Exclude current user's name
            'email' => 'required|email', // Fixing the typo and adding email validation
        ]);
        
        $user->update($request->all());
        $user->roles()->sync($request->roles);
    
        return redirect()->route('admin.users.edit', $user);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
