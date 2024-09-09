<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();

        return view('aprobaciones.empleados.index' ,compact('empleados'));
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
            'cedula' => 'required|unique:empleados',
            'nombre' => 'required',
            'apellidos' => 'required',
            'cargo' => 'required',
          ]);
          $empleado = new Empleado();
          $empleado->cedula = $request->cedula;
          $empleado->nombre = $request->nombre;
          $empleado->apellidos = $request->apellidos;
          $empleado->cargo = $request->cargo;
          $empleado->estado = 'Pendiente';

  
          $empleado->save();

  
          //Auth()->login($usuario);
         // Auth::loginUsingId($usuario->id);
  
          return redirect()->route('aprobaciones.empleados.index');
          //->with('info', 'La empresa se ha creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
