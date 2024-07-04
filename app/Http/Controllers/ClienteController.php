<?php

namespace App\Http\Controllers;

use App\Models\Acceso;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;

use App\Models\Divisione;
use App\Models\Seccione;
use App\Models\Grupo;
use App\Models\Clase;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\MiCorreo;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cliente=Cliente::find(12);
        //var_dump($cliente);
        return view('cliente.index')
                ->with('cliente',$cliente);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cliente.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $request->validate([
            'ruc' => 'required|max:11',
            'razon_social' => 'required|max:255',
            'direccion'=>'required',
            //'declaracion'=>'required|file|mimes:pdf',
        ]);
        /*
        if($request->hasFile('declaracion')){
            $nombre_pdf='declaracion_'.strval($request->ruc).'.pdf';
            $pdf=$request->file('declaracion')->storeAs('public/pdf',$nombre_pdf);
        }
        */

        if (Cliente::where('ruc', $request->ruc)->exists()) {
            // El registro ya existe
            Session::flash('mensaje_warning','Registro ya existe');
            return redirect()->route('registro');
            //return redirect()->route('register')->with(['datos'=> $response]);
        } else {
            // El registro no existe
            $cliente= Cliente::create($request->only('ruc',
                                                    'razon_social',
                                                    'desc_actividades',
                                                    'direccion',
                                                    'seccion_id',
                                                    'division_id',
                                                    'grupo_id',
                                                    'clase_id',
                                                    'nombre_responsable',
                                                    'apellido_responsable',
                                                    'email_responsable',
                                                    'telefono_responsable',  
                                                    'latitud',
                                                    'longitud',
                                                    //'declaracion'                                         

                                                ));
            //$cliente->declaracion=$nombre_pdf;
            //$cliente->save();
            //generamos el usuario
            $username=$request['nombre_responsable'].' '.$request['apellido_responsable'];
            $clave=Str::random(10);
            if (User::where('email',  $request['email_responsable'])->exists()) {
                // El registro ya existe
                Session::flash('mensaje_warning','Usuario ya existe');
                return redirect()->route('registro');
                //return redirect()->route('register')->with(['datos'=> $response]);
            } else {
            
                $usuario=User::create([
                    'name' => $username,
                    'email' => $request['email_responsable'],
                    'password' => Hash::make($clave),
                    'role_id'=> 2 ,
                ]);
                // generamos el acceso
                $acceso = Acceso::create([
                    'user_id' => $usuario->id,
                    'cliente_id' => $cliente->id,
                ]);
                
                //enviamos el correo con los datos
                $this->enviarCorreo($cliente->email_responsable,$clave,$username,$cliente->email_responsable);


                Session::flash('mensaje_exito','Registro creado con exito');
            }
        }
        
/*
        $cliente= Cliente::create($request->only('ruc','razon_social'));
        Session::flash('mensaje','Registro creado con exito');
  */
        return view('public.envio');
        #return redirect()->route('cliente.index')->with(['cliente'=> $cliente]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function validate_ruc(Request $request)
    {
        //
        $secciones=Seccione::all();
        $divisiones=Divisione::all();
        $grupos=Grupo::all();
        $clases=Clase::all();
        
        $number = $request->ruc;

        $token = 'apis-token-8344.OsSVANYn6COgvQAdWUABdRjyqLYQgv2q';

        $client = new Client(['base_uri' => 'https://api.apis.net.pe', 'verify' => false]);
    
        $parameters = [
            'http_errors' => false,
            'connect_timeout' => 5,
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Referer' => 'https://apis.net.pe/api-consulta-ruc',
                'User-Agent' => 'laravel/guzzle',
                'Accept' => 'application/json',
            ],
            'query' => ['numero' => $number]
        ];
        $res = $client->request('GET', '/v2/sunat/ruc', $parameters);
        $response = json_decode($res->getBody()->getContents(), true);
        
        //var_dump($response);
        //hasta aca tengo los datos de la empresa si es que existe
        $direccion=$response['direccion'];
        $partes=explode("INT",$direccion);
        $new_dir=str_replace("NRO","",$partes[0]);
        //AV. JUAN DE ARONA NRO 755 INT. 106 DEP. 10
        //echo $new_dir;
        //var_dump($direccion);
        $key='AIzaSyDj9fDjfvj38CqeZc3q5IIoRu4mWNn1Mgc';
        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($new_dir).'&sensor=false&key='.$key);
        // Convertir el JSON en array.
        $geo = json_decode($geo, true);
        
        //echo $direccion;
        //var_dump($geo);
        // Si todo esta bien
        $latitud="";
        $longitud="";
        if ($geo['status'] == 'OK') {
            //var_dump($geo);
            // Obtener los valores
            $latitud = $geo['results'][0]['geometry']['location']['lat'];
            $longitud = $geo['results'][0]['geometry']['location']['lng'];
        }
        /*
        */


        Session::put('datos',$response);
        Session::put('latitud',$latitud);
        Session::put('longitud',$longitud);
        return redirect()->route('registro')->with(['datos'=> $response]);

        /*
        return view('public.register')
        ->with([
            'secciones'=>$secciones,
            'datos'=>$response,
            'divisiones'=>$divisiones,
            'grupos'=>$grupos,
            'clases'=>$clases
        ]);
        */
        #return view('public.register',['datos' => $response] );

        
    }
    public function identificacion(){

        $user_id=Auth::id();
        $cliente = Cliente::whereHas('accesos', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->first();
        $usuario=User::find($user_id);
        //$cliente_id=Acceso::where('user_id',$user_id);
        //$cliente=Cliente::find($cliente_id);

        //mostrar las sedes si es que tienen
        $sedes= Sede::where('cliente_id',$cliente->id)->where('etapa_actual', 1)->get();

        return view('cliente.identificar')
        ->with([
            'usuario'=>$usuario,
            'cliente'=>$cliente,
            'sedes'=>$sedes,
        ])
        ;
        ;
    }

    public function implementacion(){

        $user_id=Auth::id();
        $cliente = Cliente::whereHas('accesos', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->first();
        $usuario=User::find($user_id);
        //$cliente_id=Acceso::where('user_id',$user_id);
        //$cliente=Cliente::find($cliente_id);

        //mostrar las sedes si es que tienen
        $sedes= Sede::where('cliente_id',$cliente->id)->where('etapa_actual', 2)->get();

        return view('sede.implementar')
        ->with([
            'usuario'=>$usuario,
            'cliente'=>$cliente,
            'sedes'=>$sedes,
            'usuario_id'=>$user_id,
        ])
        ;
        ;
    }

    public function enviarCorreo($destino,$clave,$cliente,$usuario)
    {
        $details = [
            'title' => 'Bienvenido!',
            'empresa'=>$cliente,
            'usuario'=>$usuario,
            'clave'=>$clave,
            'body' => 'Este es un correo de prueba enviado desde Laravel y su clave es:'.$clave
        ];
        $correo=new MiCorreo($details);
        //$correo->envelope("Envio de usuario plataforma adaptacion");

        Mail::to($destino)->send($correo);

        return "Correo enviado!";
    }

    public function ingreso(){
        $userId = Auth::id();
        return view('public.login')
        ->with([
            'usuario_id'=>$userId,
        ])
        
        ;
    }
    
}
