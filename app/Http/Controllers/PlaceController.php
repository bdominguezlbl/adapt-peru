<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Inundacion2020;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Objects\LineString;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Enums\Srid;
use Illuminate\View\View;
use Illuminate\Http\Request;




class PlaceController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        #buscar un lugar con id 1
        $londonEye=Place::find(1);
        #buscar una region con id 5
        $vaticanCity=Inundacion2020::find(202545);
        $vaticanCity=Place::find(202548);
        //dd($vaticanCity);
        $area=$vaticanCity->area->toJson();
        $data=json_decode($area,true);

        //var_dump($area); //string
        var_dump($data); //array(2) type=polygon , coordenadas(array(1) con un array(10)
        
        $pertenece=false;
        $latitud=-77.02799220; //latitud
        $longitud=-12.09262340;//longitud
        #creamos un punto x,y
        $punto=new Point($longitud ,$latitud,4326);     
        
        $pertenece=Place::query()
        ->whereContains('area', $punto)
        ->exists();
        var_dump($pertenece);
        dd($pertenece);

        #esta parte para buscar las coordenadas por la API de google
        #1.-creamos una direccion
        $direccion = 'San Bruno 2560, Maipu, Chile';        
        // Obtener los resultados JSON de la peticion.
        #la key de google guardada en las variables de ambiente (.env) y registrada en los services
        $key=config('services.googlekey.key');
        #llamada a la api con la dirección
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
        #2.-creamos un punto x,y para hacer pruebas, el punto esta en Perú dentro de una zona de riesgo
        $latitud=-70.190000 ;
        $longitud= -18.316389;
        $punto2=new Point($longitud ,$latitud,4326);       
        
        //echo "Latitud: ".$latitud." longitud: ".$longitud;
        #buscamos en todos los 
        $pertenece=Place::query()
        ->whereContains('area', $punto2)
        ->exists();
        var_dump($pertenece);

        return view('place.index')->with([
            'ciudad'=>$vaticanCity,      
            'lat'=>$latitud,
            'long'=>$longitud,
            'pertenece'=>$pertenece
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('place.form');
    }

}