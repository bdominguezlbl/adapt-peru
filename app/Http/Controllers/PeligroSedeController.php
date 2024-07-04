<?php

namespace App\Http\Controllers;

use App\Models\PeligroSede;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PeligroSedeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PeligroSedeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $peligroSedes = PeligroSede::paginate();

        return view('peligro-sede.index', compact('peligroSedes'))
            ->with('i', ($request->input('page', 1) - 1) * $peligroSedes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $peligroSede = new PeligroSede();

        return view('peligro-sede.create', compact('peligroSede'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeligroSedeRequest $request): RedirectResponse
    {
        PeligroSede::create($request->validated());

        return Redirect::route('peligro-sedes.index')
            ->with('success', 'PeligroSede created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $peligroSede = PeligroSede::find($id);

        return view('peligro-sede.show', compact('peligroSede'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $peligroSede = PeligroSede::find($id);

        return view('peligro-sede.edit', compact('peligroSede'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeligroSedeRequest $request, PeligroSede $peligroSede): RedirectResponse
    {
        $peligroSede->update($request->validated());

        return Redirect::route('peligro-sedes.index')
            ->with('success', 'PeligroSede updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PeligroSede::find($id)->delete();

        return Redirect::route('peligro-sedes.index')
            ->with('success', 'PeligroSede deleted successfully');
    }
}
