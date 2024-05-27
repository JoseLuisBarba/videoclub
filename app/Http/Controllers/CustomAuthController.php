<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/***
 * My imports
 */
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CustomAuthController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }
    public function customLogin(Request $request){
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard')->with('sucess', 'Inicio de sesión exitosa.');
        }
        $validator['emailPassword'] = 'El Email o Password es incorrecto';
        return redirect('login')->withErrors($validator);
    }

    public function registration(){
        return view('auth.registration');
    }

    public function customRegistration(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data = $request->all();
        $check = $this->create($data);
        return redirect('dashboard')->with('sucess', 'Tu estas registrado');
        
    }

    public function create(array $data){
        return User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password'])
        ]);
    }

    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect('login')->with('sucess', 'No está autorizado para acceder.');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
