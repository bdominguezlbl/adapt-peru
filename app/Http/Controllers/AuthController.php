<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Flasher\Toastr\Prime\ToastrInterface;

use App\Models\User;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    public function registerPost(Request $request)
    {
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Register successfully');
    }

    public function login()
    {
        
        return redirect()->route('index');
    }

    public function loginPost(Request $request)
    {
        //echo "LOGINPOST";
        
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
            ];
        //dd($credetials);

        //$condicion=Auth::attempt($credetials);
        //dd($condicion);
        if (Auth::attempt($credetials)) {
            $notification = array(
                'message' => 'Login Exitoso',
                'alert-class' => 'success'
            );
            
            return redirect('inicio')->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Usuario o contraseña invalida',
                'alert-class' => 'error'
            );
            Session::flash('message','Registro ya existe');
        }
        //Session::flash('error', 'algo fue mal');
        return back()->with($notification);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}