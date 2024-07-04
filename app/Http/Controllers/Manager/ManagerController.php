<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

use App\Models\Cliente;

class ManagerController extends Controller
{
    //
    public function index(Request $request): View
    {
        //$clientes=Cliente::all();

        $clientes=Cliente::where('solicitud_estado_id', 1)->get();
        $clientes_a=Cliente::where('solicitud_estado_id', 2)->get();
        $clientes_r=Cliente::where('solicitud_estado_id', 3)->get();
        $clientes_o=Cliente::where('solicitud_estado_id', 4)->get();
        //echo count($clientes_r);
        return view('manager.index')
        ->with([
            'clientes'=>$clientes,
            'pendientes'=>count($clientes),
            'aceptados'=>count($clientes_a),
            'rechazados'=>count($clientes_r),
            'observados'=>count($clientes_o),
        ]
        );

        /*
        return view('manager.index')
        ->with([
            'clientes'=>$clientes,
            'pendientes'=>count($clientes),
            ]
        );
        */
    }
    public function create()
    {
        //
        
    }

    public function show(Cliente $cliente)
    {
        //
        
        echo "show";
        $clientes=Cliente::where('solicitud_estado_id', 1)->get();
        $clientes_a=Cliente::where('solicitud_estado_id', 2)->get();
        $clientes_r=Cliente::where('solicitud_estado_id', 3)->get();
        $clientes_o=Cliente::where('solicitud_estado_id', 4)->get();
        $titulo="show";

        return view('manager.clientes')
            ->with([
                'clientes'=>$clientes,
                'pendientes'=>count($clientes),
                'aceptados'=>count($clientes_a),
                'rechazados'=>count($clientes_r),
                'observados'=>count($clientes_o),
                'titulo'=>$titulo,
            ]
            );
            
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }
        
    public function descargarArchivo($nombreArchivo)
    {
        $rutaArchivo = storage_path("app/public/pdf/{$nombreArchivo}"); 

        // Verificar si el archivo existe
        if (!Storage::exists("public/pdf/{$nombreArchivo}")) {
            abort(404);
        }

        // Descargar el archivo
        return response()->download($rutaArchivo);
    }

    
    
    
}
