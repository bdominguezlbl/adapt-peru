<?php
 
namespace App\Http\Middleware;
 
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
//use Auth;
 
class RedirectIfAuthenticated extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response 
   {
        if (Auth::check() && Auth::user()->role_id == 1) {
            return redirect()->route("admin.dashboard");
        } elseif (Auth::check() && Auth::user()->role_id == 2) {
            return redirect()->route("user.dashboard");
        } elseif (Auth::check() && Auth::user()->role_id == 3) {
            return redirect()->route("manager.dashboard");
        } else {
            return $next($request);
        }
    }

    public function inicio(Request $request): Response 
   {
        if (Auth::check() && Auth::user()->role_id == 1) {
            return redirect()->route("admin.dashboard");
        } elseif (Auth::check() && Auth::user()->role_id == 2) {
            return redirect()->route("user.dashboard");
        } elseif (Auth::check() && Auth::user()->role_id == 3) {
            return redirect()->route("manager.dashboard");
        } else {
            return $next($request);
        }
    }
}