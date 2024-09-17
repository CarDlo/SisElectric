<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
          ]);
          $rol = new Role();

          $rol->name = $request->name;
          $rol->guard_name = "web";
         
  
  
          $rol->save();

  
          return redirect()->route('admin.roles.index')
          ->with('mensaje', 'Se registro el rol corectamente')
          ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,

            
          ]);
          $rol = Role::find($id);
          $rol->name = $request->name;
          $rol->guard_name = "web";
         
  
  
          $rol->save();

  
          return redirect()->route('admin.roles.index')
          ->with('mensaje', 'Se modifico el rol corectamente')
          ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::destroy($id);
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Se elimino el rol correctamente')
        ->with('icono', 'success');
    }
}
