<?php

namespace App\Http\Controllers;

use App\Models\Logempleado;
use Illuminate\Http\Request;

class LogempleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // $request->validate([
        //     'cedula' => 'required|unique:empleados',
        //     'nombre' => 'required',
        //     'apellidos' => 'required',
        //     'cargo' => 'required',
        //   ]);
          $Logempleado = new Logempleado();
          $Logempleado->titulo = 'Titulo';
          $Logempleado->detalle = $request->detalle;
          $Logempleado->estado = 'Rechazado';
          $Logempleado->condicion = 'Activo';
          $Logempleado->empleado_id = 1;

          

  
          $Logempleado->save();
          return redirect()->route('aprobaciones.empleados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Logempleado $logempleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logempleado $logempleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Logempleado $logempleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logempleado $logempleado)
    {
        //
    }
}
