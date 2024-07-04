<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Sede;
use App\Models\Distrito;
use App\Models\Place;
use App\Models\Inundacion2020;
use App\Models\Inundacion2030;
use App\Models\Inundacion2050;
use App\Models\Aridez2020;
use App\Models\Aridez2030;
use App\Models\Aridez2050;
use App\Models\Erosion2020;
use App\Models\Erosion2030;
use App\Models\Erosion2050;

use App\Models\Movimiento2020;
use App\Models\Movimiento2030;
use App\Models\Movimiento2050;

use App\Models\Retroceso2020;
use App\Models\Retroceso2030;
use App\Models\Retroceso2050;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Integration\AutocompleteHandler;
use App\Models\Impacto;
use App\Models\PeligroFisico;
use App\Models\PeligroYear;
use App\Models\PeligroSede;
use App\Models\Riesgo;
use App\Models\Grupo;
use App\Models\Cliente;
use App\Models\Acceso;
use Symfony\Component\HttpFoundation\JsonResponse;
use MatanYadaev\EloquentSpatial\Objects\Point;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\MiCorreoUser;
use Mail;

class SedeController extends Controller
{
    public $googleAutocomplete;


    public function get_riesgo(string $modelClass, Sede $sede)
    {
        $longitud = $sede->longitud;
        $latitud = $sede->latitud;
        $punto = new Point($latitud, $longitud, 4326);
        $resultado = 0;

        $model = new $modelClass;

        // Busca en cada nivel para el año especificado en el modelo
        for ($i = 0; $i < 5; $i++) {
            $pertenece = $model::query()
                ->where('nivel', $i)
                ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
                ->exists();

            if ($pertenece) {
                $resultado = $i;
                break;
            }
        }

        // Entrega 0 por defecto
        return $resultado;
    }

    public function __construct(AutocompleteHandler $googleAutocomplete)
    {
        $this->googleAutocomplete = $googleAutocomplete;
    }

    public function get_riesgo_inundacion2020(Sede $sede){
        /*
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        #init datos para prueba
            //$latitud=-70.190000 ;
            //$longitud= -18.316389;
            #prueba con id=2,ok
            //$latitud=-75.24650040 ;
            //$longitud= -0.11447785;

            #prueba con id=4, ok!
            //$latitud=-70.14852945 ;
            //$longitud= -18.2877561;
            //$punto2=new Point($longitud ,$latitud,4326); 
            //$nivel_riesgo=0;
        #fin datos para prueba
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Inundacion2020::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?, 4326))", [$punto])
            //->whereRaw("ST_Contains(area, ST_GeomFromText(?))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
                
            
        }
        
        // entrego 0 por defecto 
            return $resultado;

        if($pertenece){
            //var_dump($resultado);
            //dd($pertenece);
            return $resultado;
        }else{
            var_dump($pertenece);
            dd($pertenece);
            return 12;
        }
         */
        return $this->get_riesgo(Inundacion2020::class, $sede);
    }

    public function get_riesgo_inundacion2030(Sede $sede){
        /*
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Inundacion2030::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        */
        
        return $this->get_riesgo(Inundacion2030::class, $sede);
        
    }
    public function get_riesgo_inundacion2050(Sede $sede){
        /*
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Inundacion2050::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        */
        return $this->get_riesgo(Inundacion2050::class, $sede);
    }

    public function get_riesgo_movimiento2020(Sede $sede){
        /*
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Movimiento2020::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        */
        $resultado=$this->get_riesgo(Movimiento2020::class, $sede);
    
        return $resultado;
    }

    public function get_riesgo_movimiento2020_v1(Sede $sede){
        $sedeId=$sede->id;

        $resultado = DB::select('CALL GetRiesgoInundacion2020(?, @resultado)', [$sedeId]);
        // Obtener el valor del resultado
        $riesgo = DB::select('SELECT @resultado AS riesgo')[0]->riesgo;

        return $riesgo;
    }

    public function get_riesgo_movimiento2030(Sede $sede){
        /*
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Movimiento2030::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        */
        return $this->get_riesgo(Movimiento2030::class, $sede);
    }

    public function get_riesgo_movimiento2050(Sede $sede){
        /*
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Movimiento2050::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        */
        return $this->get_riesgo(Movimiento2050::class, $sede);
    }

    public function get_riesgo_aridez2020(Sede $sede){
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Aridez2020::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        
    }

    public function get_riesgo_aridez2030(Sede $sede){
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Aridez2030::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        
    }

    public function get_riesgo_aridez2050(Sede $sede){
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Aridez2050::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        
    }

    public function get_riesgo_retroceso2020(Sede $sede){
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Retroceso2020::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        
    }

    public function get_riesgo_retroceso2030(Sede $sede){
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Retroceso2030::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        
    }

    public function get_riesgo_erosion2020(Sede $sede){
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Erosion2020::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        
    }

    public function get_riesgo_erosion2030(Sede $sede){
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Erosion2030::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        
    }

    public function get_riesgo_erosion2050(Sede $sede){
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Erosion2050::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        
    }

    public function get_riesgo_retroceso2050(Sede $sede){
        $longitud=$sede->longitud;
        $latitud=$sede->latitud;
        //$punto=new Point($longitud ,$latitud,4326);
        $punto=new Point($latitud ,$longitud,4326);
        $resultado=0;
        #busca en cada nivel para inundacion2020
        
        for($i=0;$i<5;$i++){
            
            $pertenece=Retroceso2050::query()
            ->where('nivel', $i)
            //->whereContains('area', $punto)
            ->whereRaw("ST_Contains(area, ST_GeomFromText(?,4326))", [$punto])
            ->exists()
            ;
            if($pertenece){ 
                $resultado=$i;
                break;
            }
        }        
        // entrego 0 por defecto 
        return $resultado;
        
    }



    public function set_riesgo_sede(Sede $sede,PeligroFisico $p_fisico,PeligroYear $p_year, Riesgo $riesgo){
        $peligroSede = PeligroSede::updateOrCreate([
            'sede_id' => $sede->id,
            'peligro_fisico_id' => $p_fisico->id,
            'peligro_year_id' => $p_year->id,
            ],
            [
                'riesgo_id' => $riesgo->id, // Asegúrate de que riesgo_id está presente en la solicitud
            ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cliente=Session::get('cliente');
        //dd($cliente);
        return view('sede.new')
        ->with([
            'cliente'=>$cliente,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $sede=Sede::create($request->only('nombre',
                                'cliente_id'
                                ));
        Session::flash('message', 'Sede actualizada correctamente');

        $key=config('services.googlekey.key');       
        $direccion=$request['direccion'];
        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($direccion).'&sensor=false&key='.$key);
        
        // Convertir el JSON en array.
        $geo = json_decode($geo, true);
        
        // Si todo esta bien
        if ($geo['status'] = 'OK') {
            //var_dump($geo);
            // Obtener los valores
            $latitud = $geo['results'][0]['geometry']['location']['lat'];
            $longitud = $geo['results'][0]['geometry']['location']['lng'];
        }        
        $sede->direccion=$direccion;
        $sede->latitud=$latitud;
        $sede->longitud=$longitud;        
        $sede->save();

        //calculo de riesgos
/*
        $peligroFisico = PeligroFisico::firstOrCreate(['name' => 'Movimiento en masa']);
        // 1.1 Movimiento en masa 2020
        $peligroYear = PeligroYear::firstOrCreate(['year' => 2020]);
        //falta calcular $riesgo
        $nivel_riesgo_movimiento2020=$this->get_riesgo_movimiento2020($sede);

        $riesgo=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_movimiento2020]);

        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
*/

//inicio de optimizaion
        $peligroFisico = PeligroFisico::firstOrCreate(['name' => 'Movimiento en masa']);
        
        $peligroYear20 = PeligroYear::firstOrCreate(['year' => 2020]);
        $peligroYear30 = PeligroYear::firstOrCreate(['year' => 2030]);
        $peligroYear50 = PeligroYear::firstOrCreate(['year' => 2050]);

        //$peligros_fisicos = PeligroFisico::select('id', 'name')->get();
        //peligros_years = PeligroYear::select('id', 'year')->get();
        
        $nivel_riesgo_movimiento2020=$this->get_riesgo_movimiento2020($sede);
        $nivel_riesgo_movimiento2030=$this->get_riesgo_movimiento2030($sede);
        $nivel_riesgo_movimiento2050=$this->get_riesgo_movimiento2050($sede);

        $riesgo20=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_movimiento2020]);
        $riesgo30=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_movimiento2030]);
        $riesgo50=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_movimiento2050]);
        

        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear20, $riesgo20 );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear30, $riesgo30 );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear50, $riesgo50 );

        $peligroFisico = PeligroFisico::firstOrCreate(['name' => 'Inundaciones']);
        
        $nivel_riesgo_inundacion2020=$this->get_riesgo_inundacion2020($sede);
        $nivel_riesgo_inundacion2030=$this->get_riesgo_inundacion2030($sede);
        $nivel_riesgo_inundacion2050=$this->get_riesgo_inundacion2050($sede);

        $riesgo20=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_inundacion2020]);
        $riesgo30=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_inundacion2030]);
        $riesgo50=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_inundacion2050]);        

        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear20, $riesgo20 );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear30, $riesgo30 );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear50, $riesgo50 );

        $peligroFisico = PeligroFisico::firstOrCreate(['name' => 'Cambio en condiciones de aridez']);
        
        $nivel_riesgo_aridez2020=$this->get_riesgo_aridez2020($sede);
        $nivel_riesgo_aridez2030=$this->get_riesgo_aridez2030($sede);
        $nivel_riesgo_aridez2050=$this->get_riesgo_aridez2050($sede);

        $riesgo20=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_aridez2020]);
        $riesgo30=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_aridez2030]);
        $riesgo50=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_aridez2050]);        

        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear20, $riesgo20 );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear30, $riesgo30 );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear50, $riesgo50 );

        $peligroFisico = PeligroFisico::firstOrCreate(['name' => 'Retroceso glaciar']);
        
        $nivel_riesgo_retroceso2020=$this->get_riesgo_retroceso2020($sede);
        $nivel_riesgo_retroceso2030=$this->get_riesgo_retroceso2030($sede);
        $nivel_riesgo_retroceso2050=$this->get_riesgo_retroceso2050($sede);

        $riesgo20=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_retroceso2020]);
        $riesgo30=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_retroceso2030]);
        $riesgo50=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_retroceso2050]);        

        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear20, $riesgo20 );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear30, $riesgo30 );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear50, $riesgo50 );

        $peligroFisico = PeligroFisico::firstOrCreate(['name' => 'Erosión marino-costera']);
        
        $nivel_riesgo_erosion2020=$this->get_riesgo_erosion2020($sede);
        $nivel_riesgo_erosion2030=$this->get_riesgo_erosion2030($sede);
        $nivel_riesgo_erosion2050=$this->get_riesgo_erosion2050($sede);

        $riesgo20=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_erosion2020]);
        $riesgo30=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_erosion2030]);
        $riesgo50=Riesgo::firstOrCreate(['valor' => $nivel_riesgo_erosion2050]);        

        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear20, $riesgo20 );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear30, $riesgo30 );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear50, $riesgo50 );

        $clave=Str::random(10);
        if (User::where('email',  $request['email_responsable'])->exists()) {
            // El registro ya existe
            Session::flash('mensaje_warning','Usuario ya existe');
            //return redirect()->route('dashboard');
            $usuario=User::where('email',  $request['email_responsable'])->first();
            //return redirect()->route('register')->with(['datos'=> $response]);
           
        } 
        else {
            //creamos el usuario
            $usuario=User::create([
                'name' =>  $request['responsable'],
                'email' => $request['email_responsable'],
                'password' => Hash::make($clave),
                'role_id'=> 4 ,
            ]);
            //enviamos un correo
            $this->enviarCorreo($usuario->email,$clave,$usuario->name,$usuario->email);

            $acceso = Acceso::create([
                'user_id' => $usuario->id,
                'cliente_id' => $sede->cliente_id,
            ]);
        }

        //creamos el acceso
        

        $sede->responsable_id=$usuario->id;
        $sede->save();

        $notification = array(
            'message' => 'Sede creada exitosamente',
            'alert-class' => 'success'
        );
        $cliente=Session::get('cliente');
        return redirect()->route('user.dashboard')
        ->with([$notification,
            'cliente'=>$cliente,
            ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Sede $sede)
    {
        $userId = Auth::id();
        $acceso=Acceso::where('user_id', $userId )->first();
        $cliente=Cliente::find($acceso->cliente_id);
        $usuario=User::find($acceso->user_id);

        $peligroSedes = PeligroSede::with(['peligroFisico', 'peligroYear', 'riesgo'])
            ->where('sede_id', $sede->id)
            ->get();

        $riesgos = [];

        // Construir el arreglo de riesgos
        foreach ($peligroSedes as $peligroSede) {
            $peligroFisicoName = $peligroSede->peligroFisico->name;
            $peligroYear = $peligroSede->peligroYear->year;
            $riesgoName = $peligroSede->riesgo->name;
            $riesgoNivel = $peligroSede->riesgo->valor; // Asegúrate de que el campo nivel exista

            $riesgos[$peligroFisicoName][$peligroYear] = [
                'name' => $riesgoName,
                'nivel' => $riesgoNivel
            ];
        }

        return view('sede.index')
        ->with([
            'usuario'=>$usuario,
            'cliente'=>$cliente,
            'sede'=>$sede,
            //'peligro_fisicos'=>$peligro_fisicos,
            'riesgos'=>$riesgos,
            'usuario_id'=>$userId,
        ])
        ;
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sede $sede)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sede $sede)
    {
        //
       
    }

    public function set_distrito(Request $request)
    {
        // con la nueva funcionalidad no se utilizará por ahora esta función
        $sede_id=$request['sede_id'];
        $distrito_id=$request['distrito_id'];
        $sede = Sede::find($sede_id);
        $sede->distrito_id=$distrito_id;
        $sede->save();
        Session::flash('message', 'Sede actualizada correctamente');
        return redirect()->route('sede.identificar',['id'=>$sede_id]);
    }

    public function set_direccion(Request $request)
    {
        //Agrega una dirección a la sede, junto con su longitud,latitud y 
        // nivel de riego asociado a su ubicación
        $key=config('services.googlekey.key');
        $sede_id=$request['sede_id'];        
        $sede = Sede::find($sede_id);        
        $direccion=$request['direccion'];
        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($direccion).'&sensor=false&key='.$key);
        
        // Convertir el JSON en array.
        $geo = json_decode($geo, true);
        
        // Si todo esta bien
        if ($geo['status'] = 'OK') {
            //var_dump($geo);
            // Obtener los valores
            $latitud = $geo['results'][0]['geometry']['location']['lat'];
            $longitud = $geo['results'][0]['geometry']['location']['lng'];
        }
        /* prueba
        $latitud=-76.25008468123256; //latitud ()
        $longitud=-13.847434612774048 ;//longitud
        /**/
        $sede->direccion=$direccion;
        $sede->latitud=$latitud;
        $sede->longitud=$longitud;
        
        $sede->save();

        //calculo de riesgos
        
        //tipo riesgo Movimiento en masa
        // Encontrar o crear PeligroFisico con name 'Movimiento en masa'
        /*
        $peligroFisico = PeligroFisico::firstOrCreate(
            ['name' => 'Movimiento en masa']
        );

        // Encontrar o crear PeligroYear con year 2020        
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2020]
        );

        $riesgo=Riesgo::firstOrCreate(
            ['valor' => 0]
        );
        */
        //$peligroYears=PeligroYear::all();
        // Encontrar nivel de Riesgo 
        //1 .-Movimiento en masa
        $peligroFisico = PeligroFisico::firstOrCreate(
            ['name' => 'Movimiento en masa']
        );
        // 1.1 Movimiento en masa 2020
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2020]
        );
        //falta calcular $riesgo
        $nivel_riesgo_movimiento2020=$this->get_riesgo_movimiento2020($sede);

        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_movimiento2020]
        );

        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);

        
        // 1.2 Movimiento en masa 2030
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2030]
        );
        $nivel_riesgo_movimiento2030=$this->get_riesgo_movimiento2030($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_movimiento2030]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        // 1.3 Movimiento en masa 2050
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2050]
        );
        //falta calcular $riesgo
        $nivel_riesgo_movimiento2050=$this->get_riesgo_movimiento2050($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_movimiento2050]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);

        //2. Inundaciones
        $peligroFisico = PeligroFisico::firstOrCreate(
            ['name' => 'Inundaciones']
        );
        // 2.1 Inundaciones 2020
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2020]
        );
        $nivel_riesgo_inundacion2020=$this->get_riesgo_inundacion2020($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_inundacion2020]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
     
        //para el resto dejaremos como no aplica mientras cargamos la data
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => 0]
        );

        // 2.2 Inundaciones 2030
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2030]
        );
        $nivel_riesgo_inundacion2030=$this->get_riesgo_inundacion2030($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_inundacion2030]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        // 2.3 Inundaciones 2050
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2050]
        );
        $nivel_riesgo_inundacion2050=$this->get_riesgo_inundacion2050($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_inundacion2050]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        
        //3. Cambio en condiciones de aridez
        $peligroFisico = PeligroFisico::firstOrCreate(
            ['name' => 'Cambio en condiciones de aridez']
        );
        // 3.1 Cambio en condiciones de aridez 2020
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2020]
        );
        $nivel_riesgo_aridez2020=$this->get_riesgo_aridez2020($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_aridez2020]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        // 3.2 Cambio en condiciones de aridez 2030
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2030]
        );
        $nivel_riesgo_aridez2030=$this->get_riesgo_aridez2030($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_aridez2030]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        // 3.3 Cambio en condiciones de aridez 2050
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2050]
        );
        $nivel_riesgo_aridez2050=$this->get_riesgo_aridez2050($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_aridez2050]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        
        //4. Retroceso glaciar
        $peligroFisico = PeligroFisico::firstOrCreate(
            ['name' => 'Retroceso glaciar']
        );
        // 4.1 Retroceso glaciar 2020
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2020]
        );
        $nivel_riesgo_retroceso2020=$this->get_riesgo_retroceso2020($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_retroceso2020]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        // 4.2 Retroceso glaciar 2030
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2030]
        );
        $nivel_riesgo_retroceso2030=$this->get_riesgo_retroceso2030($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_retroceso2030]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        // 4.3 Retroceso glaciar 2050
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2050]
        );
        $nivel_riesgo_retroceso2050=$this->get_riesgo_retroceso2050($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_retroceso2050]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        
        //5. Erosión marino-costera
        $peligroFisico = PeligroFisico::firstOrCreate(
            ['name' => 'Erosión marino-costera']
        );
        // 5.1 Erosión marino-costera 2020
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2020]
        );
        $nivel_riesgo_erosion2020=$this->get_riesgo_erosion2020($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_erosion2020]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        // 5.2 Erosión marino-costera 2030
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2030]
        );
        $nivel_riesgo_erosion2030=$this->get_riesgo_erosion2030($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_erosion2030]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        // 5.3 Erosión marino-costera 2050
        $peligroYear = PeligroYear::firstOrCreate(
            ['year' => 2050]
        );
        $nivel_riesgo_erosion2050=$this->get_riesgo_erosion2050($sede);
        $riesgo=Riesgo::firstOrCreate(
            ['valor' => $nivel_riesgo_erosion2050]
        );
        $this->set_riesgo_sede($sede,$peligroFisico,$peligroYear,$riesgo);
        
        
        //dd($tipo_riesgo);

        
        //limpiar los riesgos
        //insertarlos todos nuevamente
       // Crear el registro de PeligroSede
       /* se paso a una funcion esta parte
        $peligroSede = PeligroSede::updateOrCreate([
        'sede_id' => $sede->id,
        'peligro_fisico_id' => $peligroFisico->id,
        'peligro_year_id' => $peligroYear->id,
        ],
        [
            'riesgo_id' => $riesgo->id, // Asegúrate de que riesgo_id está presente en la solicitud
        ]);
        */


        //$sede->riesgo_id=$nivel_riesgo;

        //$sede->save();
        //dd($peligroSede);
        Session::flash('message', 'Sede actualizada correctamente');
        return redirect()->route('sede.show',['sede'=>$sede]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sede $sede)
    {
        //

    }

    // este metodo es posible que no se use
    public function identificar(int $sede_id)
    {
        //
        $userId = Auth::id();
        $acceso=Acceso::where('user_id', $userId )->first();
        $cliente=Cliente::find($acceso->cliente_id);
        $usuario=User::find($acceso->user_id);
        //mostrar las sedes si es que tienen
        $sede= Sede::find($sede_id);
        $distritos=Distrito::orderBy('nombre')->get();
        return view('sede.identificar')
        ->with([
            'usuario'=>$usuario,
            'cliente'=>$cliente,
            'sede'=>$sede,
            'distritos'=>$distritos,
        ])
        ;

    }
    public function impactos(int $sede_id)
    {        
        //
        $sede=Sede::find($sede_id);

        $userId = Auth::id();
        $acceso=Acceso::where('user_id', $userId )->first();
        $cliente=Cliente::find($acceso->cliente_id);
        $usuario=User::find($acceso->user_id);

        //mostrar las sedes si es que tienen
        //$sede= Sede::find($sede_id);
        
        $grupo=$cliente->grupo;
        //$grupo_id=$cliente->grupo_id;

        $clasificacion=$grupo->clasificacion_id;
        
        $peligroSedes = PeligroSede::with(['peligroFisico'])
            ->where('sede_id', $sede->id)
            ->whereHas('riesgo',function($query){
                $query->whereIn('valor',[3,4]);
            })            
            ->get();

            $resultado=[];
            foreach($peligroSedes as $peligroSede){
                $peligroFisicoId = $peligroSede->peligroFisico->id;

                $impactos = Impacto::where('peligro_fisico_id', $peligroFisicoId)
                    ->where('clasificacion_id', $clasificacion)
                    ->get();
                
                foreach($impactos as $impacto){
                    
                    $categoria = $impacto->categoriaImpacto ? $impacto->categoriaImpacto->categoria : 'N/A';
                    $etapa = $impacto->etapaImpacto ? $impacto->etapaImpacto->etapa : 'N/A';
       
                    $resultado[$peligroSede->peligroFisico->name][$etapa][$categoria] =[
                        'categoria'=>$categoria,
                        'descripcion'=>$impacto->descripcion,
                    ];
                }
            }

        $distritos=Distrito::orderBy('nombre')->get();
        return view('sede.impactos')
        ->with([
            'usuario'=>$usuario,
            'cliente'=>$cliente,
            'sede'=>$sede,
            'resultado'=>$resultado,
            'usuario_id'=>$userId,
            
        ])
        ;
    }

    public function recomendacion(int $sede_id)
    {
        $sede=Sede::find($sede_id);

        $userId = Auth::id();
        $acceso=Acceso::where('user_id', $userId )->first();
        $cliente=Cliente::find($acceso->cliente_id);
        $usuario=User::find($acceso->user_id);

        $grupo=$cliente->grupo;
        $clasificacion=$grupo->clasificacion_id;
        
        $peligroSedes = PeligroSede::with(['peligroFisico'])
            ->where('sede_id', $sede->id)
            ->whereHas('riesgo',function($query){
                $query->whereIn('valor',[3,4]);
            })            
            ->get();

            $resultado=[];
            foreach($peligroSedes as $peligroSede){
                $peligroFisicoId = $peligroSede->peligroFisico->id;

                $impactos = Impacto::where('peligro_fisico_id', $peligroFisicoId)
                    ->where('clasificacion_id', $clasificacion)
                    ->whereNotNull('recomendacion')
                    ->where('recomendacion', '!=', '')
                    ->get();
                    
                
                foreach($impactos as $impacto){
                    
                    $categoria = $impacto->categoriaImpacto ? $impacto->categoriaImpacto->categoria : 'N/A';
                    $etapa = $impacto->etapaImpacto ? $impacto->etapaImpacto->etapa : 'N/A';
       
                    $resultado[$peligroSede->peligroFisico->name][$etapa][$categoria] =[
                        'categoria'=>$categoria,
                        'recomendacion'=>$impacto->recomendacion,
                    ];
                }
            }
            //dd($resultado);
            
        return view('sede.recomendacion')
        ->with([
            'usuario'=>$usuario,
            'cliente'=>$cliente,
            'sede'=>$sede,
            'resultado'=>$resultado,
            'usuario_id'=>$userId,
            
        ])
        ;
    }

    public function new()
    {
        //
        $userId = Auth::id();
        $acceso=Acceso::where('user_id', $userId )->first();
        $cliente=Cliente::find($acceso->cliente_id);

        $usuario=User::find($acceso->user_id);
        return view('sede.new')
        ->with([
            'usuario'=>$usuario,
            'cliente'=>$cliente,
            'usuario_id'=>$userId,
        ])
        ;
    }

    public function delete(int $sede_id)
    {
        //
        $userId = Auth::id();
        $acceso=Acceso::where('user_id', $userId )->first();
        $cliente=Cliente::find($acceso->cliente_id);
        $usuario=User::find($acceso->user_id);


        //mostrar las sedes si es que tienen
        $sede= Sede::find($sede_id);
        $sede->delete();
        $sedes=Sede::where('cliente_id',$cliente->id)->get();
        return view('user.dashboard')
        ->with([
            'usuario'=>$usuario,
            'cliente'=>$cliente,
            'sedes'=>$sedes,
        ])
        ;

    }
    public function getPlaceId(Request $request)
    {
        //get user-typed address via Ajax request
        return $this->googleAutocomplete->placeId($request->inputData);
    }

    public function findAddressBasedOnPlaceId(Request $request): JsonResponse
    {
        return $this->googleAutocomplete->addressBasedOnPlaceId($request->placeId);
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
        $correo=new MiCorreoUser($details);
        //$correo->envelope("Envio de usuario plataforma adaptacion");

        Mail::to($destino)->send($correo);

        return "Correo enviado!";
    }
}
