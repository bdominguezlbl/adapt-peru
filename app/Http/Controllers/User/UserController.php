<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Acceso;
use App\Models\Sede;

class UserController extends Controller
{
    //
    public function index(Request $request): View
    {
        $userId = Auth::id();
        $acceso=Acceso::where('user_id', $userId )->first();

        $cliente=Cliente::find($acceso->cliente_id);
        $usuario=User::find($acceso->user_id);
        $sedes=$cliente->sedes;
//        $sedes=Sede::where('cliente_id', 12 );

        //dd($sedes);

        Session::put('usuario',$usuario);
        Session::put('cliente',$cliente);
        Session::put('usuario_id',$usuario->id);
        Session::put('cliente_id',$cliente->id);
        
        return view('user.dashboard')
            ->with([
                'cliente' => $cliente,
                'usuario'=>$usuario,
                'sedes'=>$sedes,
                'usuario_id'=>$userId,
            ]);
    }
    public function store(Request $request)
    {
        //dd($request);
        $user=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id'=> 2 ,
        ]);

        $cliente_id=$request['cliente_id'];
        $cliente=Cliente::find($cliente_id);
        $cliente->solicitud_estado_id=2;
        $cliente->save();
        //acceso:
        $acceso=Acceso::create([
            'user_id' => $user->id,
            'cliente_id' => $cliente->id,
            ]);


        
        $clientes=Cliente::where('solicitud_estado_id', 1)->get();
        return view('manager.clientes')
        ->with(['titulo'=>'Pendientes',
                'clientes'=>$clientes,
            ]);
            ;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
