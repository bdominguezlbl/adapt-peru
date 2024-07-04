<?php

namespace App\Http\Controllers;

use App\Models\PeligroFisico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PeligroFisicoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PeligroFisicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $peligroFisicos = PeligroFisico::paginate();

        return view('peligro-fisico.index', compact('peligroFisicos'))
            ->with('i', ($request->input('page', 1) - 1) * $peligroFisicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $peligroFisico = new PeligroFisico();

        return view('peligro-fisico.create', compact('peligroFisico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeligroFisicoRequest $request): RedirectResponse
    {
        PeligroFisico::create($request->validated());

        return Redirect::route('peligro-fisicos.index')
            ->with('success', 'PeligroFisico created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $peligroFisico = PeligroFisico::find($id);

        return view('peligro-fisico.show', compact('peligroFisico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $peligroFisico = PeligroFisico::find($id);

        return view('peligro-fisico.edit', compact('peligroFisico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeligroFisicoRequest $request, PeligroFisico $peligroFisico): RedirectResponse
    {
        $peligroFisico->update($request->validated());

        return Redirect::route('peligro-fisicos.index')
            ->with('success', 'PeligroFisico updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PeligroFisico::find($id)->delete();

        return Redirect::route('peligro-fisicos.index')
            ->with('success', 'PeligroFisico deleted successfully');
    }
}
