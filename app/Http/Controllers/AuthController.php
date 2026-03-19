<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'edad' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',    
            'phone' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

                //si todo ta bien ya abre cambiado lo de  y esto de aqui es la logica de seguridad para lo del campo de admin
        //y con esto ya solo si  el usuario es autenticado y es admin va a poder asignar el  rol de admin a otro ... si todo sale bien ps

        $isAdminValue = false;
        if (Auth::check() && Auth::user()->is_admin) {
            $isAdminValue = $request->has('is_admin');
        }

        $user = User::create([
            'name' => $request->name,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $isAdminValue, // Valor protegido por lógica de negocio
        ]);

        if (!Auth::check()) {
            Auth::login($user);
            return redirect()->route('comida.index');
        }
            return redirect()->route('admin.dashboard')->with('success', 'Usuario registrado correctamente.');
    }

    public function loginForm()
    {
        return view('auth.login');
    }
    

        //metodo para iniciar sesion
    public function login(Request $request)
    {
        //validar datos en el formulario
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //intentar reañizar el inicio de sesion con la informacion del formulario 
        if(Auth::attempt($data))
        {
            //ruta para enviar al usuario cuando se incia la sesion
            return redirect()->route('pedido.index');
        }
        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ]);
        }
        //metodo para cerrar sesion
        public function logout(Request $request){
            //cerrar sesion
            auth()->logout();
            //cerrar credenciales de usuario
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/acceso');
        }

        public function admindashboard(){
            return view('admin.dashboard');
        }
       

}
