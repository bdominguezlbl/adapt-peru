<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('dashboard');
        $user_id=Auth::id();
        $user=User::find($user_id);
        //dd($user->role_id);
        //$cliente=Cliente::find(12);
        if($user->role_id==1){
            return redirect()->route('admin.dashboard');
        }
        else if($user->role_id==2){
            return redirect()->route('user.dashboard');
        }
        else if ($user->role_id==3){
            return redirect()->route('manager.dashboard');
        }

        return redirect()->route('dashboard');
    }
}
