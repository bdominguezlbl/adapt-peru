<?php

namespace App\Http\Controllers;

use App\Models\ClasificacionGrupo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClasificacionGrupoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClasificacionGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $clasificacionGrupos = ClasificacionGrupo::paginate();

        return view('clasificacion-grupo.index', compact('clasificacionGrupos'))
            ->with('i', ($request->input('page', 1) - 1) * $clasificacionGrupos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $clasificacionGrupo = new ClasificacionGrupo();

        return view('clasificacion-grupo.create', compact('clasificacionGrupo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClasificacionGrupoRequest $request): RedirectResponse
    {
        ClasificacionGrupo::create($request->validated());

        return Redirect::route('clasificacion-grupos.index')
            ->with('success', 'ClasificacionGrupo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $clasificacionGrupo = ClasificacionGrupo::find($id);

        return view('clasificacion-grupo.show', compact('clasificacionGrupo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $clasificacionGrupo = ClasificacionGrupo::find($id);

        return view('clasificacion-grupo.edit', compact('clasificacionGrupo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClasificacionGrupoRequest $request, ClasificacionGrupo $clasificacionGrupo): RedirectResponse
    {
        $clasificacionGrupo->update($request->validated());

        return Redirect::route('clasificacion-grupos.index')
            ->with('success', 'ClasificacionGrupo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        ClasificacionGrupo::find($id)->delete();

        return Redirect::route('clasificacion-grupos.index')
            ->with('success', 'ClasificacionGrupo deleted successfully');
    }
}
