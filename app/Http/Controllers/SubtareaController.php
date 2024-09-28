<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Subtarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubtareaController extends Controller
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
        $subtarea = new Subtarea();

        $subtarea->titulo = $request->titulo;
        $subtarea->detalle = $request->detalle;
        $subtarea->estado = $request->estado;
        $subtarea->vencimiento = $request->new_vencimiento;
        $subtarea->tarea_id = $request->tarea_id;
        $subtarea->user_id = Auth::user()->id;


        $subtarea->save();

        $tareaUpdate = Tarea::find($request->tarea_id);
        $tareaUpdate->update(['vencimiento' => $request->new_vencimiento]);
        $tareaUpdate->update(['estado' => $request->estado]);
        $tareaUpdate->save();

        return redirect()->route('tareas.index')
        ->with('mensaje', 'Se registro la tarea corectamente')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subtarea $subtarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subtarea $subtarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subtarea $subtarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subtarea $subtarea)
    {
        //
    }
}
