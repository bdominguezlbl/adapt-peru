<?php

namespace App\Http\Controllers;

use App\Models\Acceso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AccesoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $accesos = Acceso::paginate();

        return view('acceso.index', compact('accesos'))
            ->with('i', ($request->input('page', 1) - 1) * $accesos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $acceso = new Acceso();

        return view('acceso.create', compact('acceso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccesoRequest $request): RedirectResponse
    {
        Acceso::create($request->validated());

        return Redirect::route('accesos.index')
            ->with('success', 'Acceso created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $acceso = Acceso::find($id);

        return view('acceso.show', compact('acceso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $acceso = Acceso::find($id);

        return view('acceso.edit', compact('acceso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccesoRequest $request, Acceso $acceso): RedirectResponse
    {
        $acceso->update($request->validated());

        return Redirect::route('accesos.index')
            ->with('success', 'Acceso updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Acceso::find($id)->delete();

        return Redirect::route('accesos.index')
            ->with('success', 'Acceso deleted successfully');
    }
}
