<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Response;
//use App\Http\Middleware\AdminUserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\ManagerMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Session;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            
            'user'=> UserMiddleware::class,
            'admin'=> AdminMiddleware::class,
            'manager'=> ManagerMiddleware::class,
            
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        $exceptions->respond(function (Response $response) {
            if ($response->getStatusCode() === 419) {
                Session::flash('message','Pagina expirada');
                return back()->with([
                    'message' => 'Página expirada, please try again.',
                ]);
            }
     
            return $response;
        });
    })
    ->create();
