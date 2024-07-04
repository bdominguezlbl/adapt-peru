<?php

namespace App\Http\Controllers;

use App\Models\Divisione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DivisioneRequest;
use App\Models\Seccione;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DivisioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $divisiones = Divisione::paginate();

        return view('divisione.index', compact('divisiones'))
            ->with('i', ($request->input('page', 1) - 1) * $divisiones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $divisione = new Divisione();
        $secciones = Seccione::pluck('id','name');
        return view('divisione.create', compact('divisione','secciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DivisioneRequest $request): RedirectResponse
    {
        Divisione::create($request->validated());

        return Redirect::route('divisiones.index')
            ->with('success', 'Divisione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $divisione = Divisione::find($id);

        return view('divisione.show', compact('divisione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $divisione = Divisione::find($id);
        $secciones = Seccione::pluck('id','name');
        return view('divisione.edit', compact('divisione','secciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DivisioneRequest $request, Divisione $divisione): RedirectResponse
    {
        $divisione->update($request->validated());

        return Redirect::route('divisiones.index')
            ->with('success', 'Divisione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Divisione::find($id)->delete();

        return Redirect::route('divisiones.index')
            ->with('success', 'Divisione deleted successfully');
    }
}
