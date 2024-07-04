<?php

namespace App\Http\Controllers;

use App\Models\Seccione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SeccioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SeccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $secciones = Seccione::paginate();

        return view('seccione.index', compact('secciones'))
            ->with('i', ($request->input('page', 1) - 1) * $secciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $seccione = new Seccione();

        return view('seccione.create', compact('seccione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeccioneRequest $request): RedirectResponse
    {
        Seccione::create($request->validated());

        return Redirect::route('secciones.index')
            ->with('success', 'Seccione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $seccione = Seccione::find($id);

        return view('seccione.show', compact('seccione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $seccione = Seccione::find($id);

        return view('seccione.edit', compact('seccione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeccioneRequest $request, Seccione $seccione): RedirectResponse
    {
        $seccione->update($request->validated());

        return Redirect::route('secciones.index')
            ->with('success', 'Seccione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Seccione::find($id)->delete();

        return Redirect::route('secciones.index')
            ->with('success', 'Seccione deleted successfully');
    }
}
