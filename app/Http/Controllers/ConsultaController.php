<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;


class ConsultaController extends Controller
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
        //
        // Validar la solicitud
        $paso="pre.validar";
        //dd($request);
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'consulta' => 'required|string',
        ]);
        
        // Crear una nueva consulta
        Consulta::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'consulta' => $request->consulta,
        ]);
        
        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', '¡Consulta enviada con éxito!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Consulta $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consulta $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $comentario)
    {
        //
    }
}
