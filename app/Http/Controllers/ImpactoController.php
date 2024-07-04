<?php

namespace App\Http\Controllers;

use App\Models\Impacto;
use App\Models\EtapaImpacto;
use App\Models\PeligroFisico;
use App\Models\CategoriaImpacto;
use App\Models\ClasificacionGrupo;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ImpactoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ImpactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $impactos = Impacto::paginate();

        return view('impacto.index', compact('impactos'))
            ->with('i', ($request->input('page', 1) - 1) * $impactos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $impacto = new Impacto();
        $etapas = EtapaImpacto::pluck('id','etapa');
        $peligros=PeligroFisico::pluck('id','name');
        $categorias=CategoriaImpacto::pluck('id','categoria');
        $clasificaciones=ClasificacionGrupo::pluck('id','clasificacion');
        return view('impacto.create', compact('impacto','etapas','peligros','categorias','clasificaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImpactoRequest $request): RedirectResponse
    {
        Impacto::create($request->validated());

        return Redirect::route('impactos.index')
            ->with('success', 'Impacto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $impacto = Impacto::find($id);

        return view('impacto.show', compact('impacto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $impacto = Impacto::find($id);
        $etapas = EtapaImpacto::pluck('id','etapa');
        $peligros=PeligroFisico::pluck('id','name');
        $categorias=CategoriaImpacto::pluck('id','categoria');
        $clasificaciones=ClasificacionGrupo::pluck('id','clasificacion');


        return view('impacto.edit', [
            'impacto' => $impacto,
            'etapas' => $etapas,
            'peligros' => $peligros,
            'categorias' => $categorias,
            'clasificaciones' => $clasificaciones,
            'selectedCategoriaId' => $impacto->categoria_id,
            'selectedClasificacionId' => $impacto->clasificacion_id,
            'selectedEtapaId' => $impacto->etapa_id,
            'selectedPeligroId' => $impacto->peligro_fisico_id,

        ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImpactoRequest $request, Impacto $impacto): RedirectResponse
    {
        $impacto->update($request->validated());

        return Redirect::route('impactos.index')
            ->with('success', 'Impacto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Impacto::find($id)->delete();

        return Redirect::route('impactos.index')
            ->with('success', 'Impacto deleted successfully');
    }
}
