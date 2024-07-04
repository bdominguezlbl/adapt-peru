<?php

namespace App\Http\Controllers;

use App\Models\SolicitudEstado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SolicitudEstadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SolicitudEstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $solicitudEstados = SolicitudEstado::paginate();

        return view('solicitud-estado.index', compact('solicitudEstados'))
            ->with('i', ($request->input('page', 1) - 1) * $solicitudEstados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $solicitudEstado = new SolicitudEstado();

        return view('solicitud-estado.create', compact('solicitudEstado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SolicitudEstadoRequest $request): RedirectResponse
    {
        SolicitudEstado::create($request->validated());

        return Redirect::route('solicitud-estados.index')
            ->with('success', 'SolicitudEstado created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $solicitudEstado = SolicitudEstado::find($id);

        return view('solicitud-estado.show', compact('solicitudEstado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $solicitudEstado = SolicitudEstado::find($id);

        return view('solicitud-estado.edit', compact('solicitudEstado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SolicitudEstadoRequest $request, SolicitudEstado $solicitudEstado): RedirectResponse
    {
        $solicitudEstado->update($request->validated());

        return Redirect::route('solicitud-estados.index')
            ->with('success', 'SolicitudEstado updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        SolicitudEstado::find($id)->delete();

        return Redirect::route('solicitud-estados.index')
            ->with('success', 'SolicitudEstado deleted successfully');
    }
}
