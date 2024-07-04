<?php

namespace App\Http\Controllers;

use App\Models\EtapaImpacto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EtapaImpactoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EtapaImpactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $etapaImpactos = EtapaImpacto::paginate();

        return view('etapa-impacto.index', compact('etapaImpactos'))
            ->with('i', ($request->input('page', 1) - 1) * $etapaImpactos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $etapaImpacto = new EtapaImpacto();

        return view('etapa-impacto.create', compact('etapaImpacto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EtapaImpactoRequest $request): RedirectResponse
    {
        EtapaImpacto::create($request->validated());

        return Redirect::route('etapa-impactos.index')
            ->with('success', 'EtapaImpacto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $etapaImpacto = EtapaImpacto::find($id);

        return view('etapa-impacto.show', compact('etapaImpacto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $etapaImpacto = EtapaImpacto::find($id);

        return view('etapa-impacto.edit', compact('etapaImpacto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EtapaImpactoRequest $request, EtapaImpacto $etapaImpacto): RedirectResponse
    {
        $etapaImpacto->update($request->validated());

        return Redirect::route('etapa-impactos.index')
            ->with('success', 'EtapaImpacto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EtapaImpacto::find($id)->delete();

        return Redirect::route('etapa-impactos.index')
            ->with('success', 'EtapaImpacto deleted successfully');
    }
}
