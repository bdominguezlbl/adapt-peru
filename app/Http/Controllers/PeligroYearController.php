<?php

namespace App\Http\Controllers;

use App\Models\PeligroYear;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PeligroYearRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PeligroYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $peligroYears = PeligroYear::paginate();

        return view('peligro-year.index', compact('peligroYears'))
            ->with('i', ($request->input('page', 1) - 1) * $peligroYears->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $peligroYear = new PeligroYear();

        return view('peligro-year.create', compact('peligroYear'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeligroYearRequest $request): RedirectResponse
    {
        PeligroYear::create($request->validated());

        return Redirect::route('peligro-years.index')
            ->with('success', 'PeligroYear created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $peligroYear = PeligroYear::find($id);

        return view('peligro-year.show', compact('peligroYear'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $peligroYear = PeligroYear::find($id);

        return view('peligro-year.edit', compact('peligroYear'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeligroYearRequest $request, PeligroYear $peligroYear): RedirectResponse
    {
        $peligroYear->update($request->validated());

        return Redirect::route('peligro-years.index')
            ->with('success', 'PeligroYear updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PeligroYear::find($id)->delete();

        return Redirect::route('peligro-years.index')
            ->with('success', 'PeligroYear deleted successfully');
    }
}
