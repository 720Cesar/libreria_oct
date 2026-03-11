<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function registerForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users', 
            'phone' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin'),
        ]);

        // Inicio de sesión de manera automática
        // Auth::login($user);

        return redirect()->route('acceso');
    }

    // Regresar vista del inicio de sesión
    public function loginForm(){
        return view('auth.login');
    }

    // Método para verificar el inicio de sesión
    public function login(Request $request){

        // Validar los datos obtenidos del formulario
        $data = $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Se realiza una validación para generar la sesión
        if(Auth::attempt($data)){
            $request -> session()->regenerate();
            // Redireccionar al usuario cuando accede
            return redirect()->route('libros.index');
        }
        return back()->withErrors([
            'email' => 'Datos incorrectos'
        ]);

    }

    // Método para cerrar sesión
    public function logout(Request $request){

        // Cierre de la sesión
        Auth::logout();
        // Cierre de credenciales en sesiones
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/acceso');
    }

    public function adminDashboard(){
        return view('admin.dashboard');
    }
    
}
