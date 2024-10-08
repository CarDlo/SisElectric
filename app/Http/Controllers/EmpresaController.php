<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('admin.empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'nit' => 'required|unique:empresas',
          ]);
          $empresa = new Empresa();
          $empresa->nombre = $request->nombre;
          $empresa->tramo = $request->tramo;
          $empresa->nit = $request->nit;
          $empresa->tipo = $request->tipo;
  
          $empresa->save();


          return redirect()->route('admin.empresas.index')
          ->with('mensaje', 'Se creo la empresa correctamente')
          ->with('icono', 'success');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
          $request->validate([
            'nombre' => 'required',
            'nit' => 'required|unique:empresas,nit,'.$id,
          ]);
          $empresa = Empresa::find($id);
          $empresa->nombre = $request->nombre;
          $empresa->tramo = $request->tramo;
          $empresa->nit = $request->nit;
          $empresa->tipo = $request->tipo;

          $empresa->save();
  
          return redirect()->route('admin.empresas.index')
          ->with('mensaje', 'Se modifico la empresa correctamente')
          ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Empresa::destroy($id);
        return redirect()->route('admin.empresas.index')
        ->with('mensaje', 'Se elimino el rol correctamente')
        ->with('icono', 'success');
    }
}
