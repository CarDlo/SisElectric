<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::with('subtareas')->get(); // Obtener todas las tareas con sus subtareas
        return view('tareas.index', compact('tareas'));
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
        //     'name' => 'required|unique:roles',
        //   ]);
       // return response()->json($request);
          $tarea = new Tarea();

          $tarea->titulo = $request->titulo;
          $tarea->detalle = $request->detalle;
          $tarea->estado = "Pendiente";
          $tarea->vencimiento = $request->vencimiento;
          $tarea->user_id = Auth::user()->id;

  
          $tarea->save();

  
          return redirect()->route('tareas.index')
          ->with('mensaje', 'Se registro la tarea corectamente')
          ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tarea = Tarea::with('subtareas')->findOrFail($id);
        return response()->json($tarea); // Retorna la tarea y sus subtareas como JSON
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tarea::destroy($id);
        return redirect()->route('tareas.index')
        ->with('mensaje', 'Se elimino la actividad correctamente')
        ->with('icono', 'success');
    }
}
