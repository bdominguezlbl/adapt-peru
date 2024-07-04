<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Models\Divisione;
use App\Models\Seccione;
use App\Models\Grupo;
use App\Models\Clase;
use App\Models\Cliente;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\SolicitudEstadoController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Middleware\RedirectIfAuthenticated;

use App\Http\Controllers\PeligroFisicoController;
use App\Http\Controllers\PeligroYearController;
use App\Http\Controllers\PeligroSedeController;
use App\Http\Controllers\ClasificacionGrupoController;
use App\Http\Controllers\CategoriaImpactoController;
use App\Http\Controllers\EtapaImpactoController;
use App\Http\Controllers\ImpactoController;
use App\Http\Controllers\ConsultaController;
/*Zona AUTH */

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AutocompleteController;
Route::get('/autocomplete', [AutocompleteController::class, 'autocomplete'])->name('autocomplete');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
  });

  Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });


//Auth::routes();


/*RUTAS DE ZONA PUBLICA */
Route::get('/', function () {

    $userId = Auth::id();
    
    return view('public.index')
    ->with([
        'usuario_id'=>$userId,
    ]);
})->name('index');

Route::get('/participantes', function () {
    $userId = Auth::id();
    return view('public.participantes')
    ->with([
        'usuario_id'=>$userId,
    ]);
});

Route::get('/estadisticas', function () {
    $userId = Auth::id();
    return view('public.estadisticas')->with([
        'usuario_id'=>$userId,
    ]);
});

Route::get('/servicio', function () {
    $userId = Auth::id();
    return view('public.servicio')->with([
        'usuario_id'=>$userId,
    ]);
});

Route::get('/blog', function () {
    $userId = Auth::id();
    return view('public.blog')->with([
        'usuario_id'=>$userId,
    ]);
});
Route::get('/consultas', function () {
    $userId = Auth::id();
    return view('public.consultas')->with([
        'usuario_id'=>$userId,
    ]);
});

Route::get('/ingreso', [ClienteController::class, 'ingreso'])->name('ingreso');

Route::post('/consultas', [ConsultaController::class, 'store'])->name('consultas.store');

Route::get('/herramientas', function () {
    $userId = Auth::id();
    return view('public.herramientas')->with([
        'usuario_id'=>$userId,
    ]);
});

Route::get('/registro', function ($datos="") {
    //var_dump($datos);
    $latitud=$longitud=0;
    if (Session::has('datos')) {
        $datos=Session::get('datos');
    }
    if (Session::has('latitud')) {
        $latitud=Session::get('latitud');
    }
    if (Session::has('longitud')) {
        $longitud=Session::get('longitud');
    }

    $secciones=Seccione::all();
    $divisiones=Divisione::all();
    $grupos=Grupo::all();
    $clases=Clase::all();
    return view('public.registro')
    ->with([
        'secciones'=>$secciones,
        'datos'=>$datos,
        'divisiones'=>$divisiones,
        'grupos'=>$grupos,
        'clases'=>$clases,
        'latitud'=>$latitud,
        'longitud'=>$longitud,
        'usuario_id'=> Auth::id(),
    ]);
})->name('registro');

Route::post('/validate_ruc', [ClienteController::class, 'validate_ruc'])->name('validate_ruc');

//RUTAS DE LAS API PARA LOS SELECTORES DE REGISTRO
Route::get('seccion/{id}/divisiones',function($id){
    $seccion=Seccione::find($id);
    return Divisione::where('seccion_id',$seccion->id)->get();
});

Route::get('division/{id}/grupos',function($id){
    $division=Divisione::find($id);
    return Grupo::where('division_id',$division->id)->get();
});

Route::get('grupo/{id}/clases',function($id){
    $grupo=Grupo::find($id);
    return Clase::where('grupo_id',$grupo->id)->get();
});



Route::resource('cliente',ClienteController::class);

Route::group(['role_id'=>1,'as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
    //echo "ADMIN";
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
});

Route::group(['role_id'=>2,'as'=>'user.','prefix' => 'user','namespace'=>'User','middleware'=>['auth','user']], function () {
    //echo "USER";
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
});

Route::group(['role_id'=>3,'as'=>'manager.','prefix' => 'manager','namespace'=>'Manager','middleware'=>['auth','manager']], function () {
    //echo "MANAGER";
    Route::get('dashboard', [ManagerController::class, 'index'])->name('dashboard');
});

Route::resource('user',UserController::class);

//RUTAS PARA EL USUARIO ADMIN
Route::resource('secciones',App\Http\Controllers\SeccioneController::class);
Route::resource('divisiones',App\Http\Controllers\DivisioneController::class);
Route::resource('grupos',App\Http\Controllers\GrupoController::class);
Route::resource('clases',App\Http\Controllers\ClaseController::class);
//Route::resource('solicitud-estados',App\Http\Controllers\SolicitudEstadoController::class);
Route::resource('solicitud-estados',SolicitudEstadoController::class);
Route::resource('place',PlaceController::class);
// ruta para crud de accesos
Route::resource('accesos', AccesoController::class);


//RUTAS PARA EL USUARIO MANAGER
//para descargar un archivo
Route::get('/descargar/{nombreArchivo}', [ManagerController::class, 'descargarArchivo'])->name('descargar.archivo');

Route::get('/manager/registradas', function () {
    $titulo="registradas";
    $clientes=Cliente::where('solicitud_estado_id', 1)->get();
    return view('manager.clientes')
        ->with(['clientes'=>$clientes,
        'titulo'=>$titulo,
                
        ]); 
})->name('manager.registradas');

Route::get('/manager/aceptar/{id}',function($id){
    $cliente=Cliente::find($id);
    return view('manager.aceptar')
        ->with(['cliente'=>$cliente,
                
        ]); 
})->name('manager.aceptar');

Route::get('/manager/rechazar/{id}',function($id){
    $cliente=Cliente::find($id);
    return view('manager.rechazo')
        ->with(['cliente'=>$cliente,
                
        ]); 
})->name('manager.rechazar');

Route::get('/manager/observar/{id}',function($id){
    $cliente=Cliente::find($id);
    return view('manager.observacion')
        ->with(['cliente'=>$cliente,
                
        ]); 
})->name('manager.observar');

Route::get('/manager/aceptadas', function () {
    $titulo="aceptadas";
    $clientes=Cliente::where('solicitud_estado_id', 2)->get();
    return view('manager.clientes')
        ->with(['clientes'=>$clientes,
        'titulo'=>$titulo,                
        ]); 
})->name('manager.aceptadas');

Route::get('/manager/rechazados', function () {
    $titulo="rechazados";
    $clientes=Cliente::where('solicitud_estado_id', 3)->get();
    return view('manager.clientes')
        ->with(['clientes'=>$clientes,
        'titulo'=>$titulo,                
        ]); 
})->name('manager.rechazados');

Route::get('/manager/observadas', function () {
    $titulo="observadas";
    $clientes=Cliente::where('solicitud_estado_id', 4)->get();
    return view('manager.clientes')
        ->with(['clientes'=>$clientes,
        'titulo'=>$titulo,                
        ]); 
})->name('manager.observadas');

Route::resource('manager',ManagerController::class);


//RUTAS PARA EL USUARIO USER

Route::get('/identificacion', [ClienteController::class, 'identificacion'])->name('identificacion');
Route::get('/sede/implementacion/{id}', [ClienteController::class, 'implementacion'])->name('sede.implementacion');
Route::get('/sede/identificar/{id}', [SedeController::class, 'identificar'])->name('sede.identificar');
Route::resource('sedes', SedeController::class);
Route::get('/sede/impactos/{sede_id}', [SedeController::class, 'impactos'])->name('sede.impactos');
Route::get('/sede/recomendacion/{id}', [SedeController::class, 'recomendacion'])->name('sede.recomendacion');
Route::post('/sede/store', [SedeController::class, 'store'])->name('sede.store');
Route::post('/sede/set_distrito', [SedeController::class, 'set_distrito'])->name('sede.set_distrito');
Route::get('/sede/new', [SedeController::class, 'new'])->name('sede.new');

Route::get('/sede/delete/{id}', [SedeController::class, 'delete'])->name('sede.delete');


Route::get('/inicio', [RedirectIfAuthenticated::class, 'inicio'])->name('inicio');


//rutas para las sedes
Route::resource('sede',SedeController::class);
Route::get('/placeid',[ SedeController::class,'getPlaceId'])->name('placeid');
Route::get('address',[ SedeController::class,'findAddressBasedOnPlaceId'])->name('address');
Route::post('set_direccion',[ SedeController::class,'set_direccion'])->name('sede.set_direccion');

/*pruebas con shapefile */

//use App\Models\Shapefile;

use App\Http\Controllers\ShapefileController;

Route::get('/shapefile', [ShapefileController::class, 'index'])->name('shapefile');

Route::get('/riesgo', [ShapefileController::class, 'riesgo'])->name('riesgo');

Route::resource('peligro-fisicos', PeligroFisicoController::class);
Route::resource('peligro-years', PeligroYearController::class);
Route::resource('peligro-sedes', PeligroSedeController::class);
Route::resource('clasificacion-grupos', ClasificacionGrupoController::class);
Route::resource('categoria-impactos', CategoriaImpactoController::class);
Route::resource('etapa-impactos', EtapaImpactoController::class);
Route::resource('impactos', ImpactoController::class);

//Route::get('/consultas/crear', [ComentarioController::class, 'create'])->name('comentario.create');
