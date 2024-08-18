<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthControl extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'action' => 'required|in:register,login',
        ]);

        if ($request->action == 'register') {

            return $this->registerUser($request);

        } elseif ($request->action == 'login') {

            return $this->loginUser($request);

        } else {
            abort(400, $request);
        }
    }


    public function registerUser(Request $request){

        $validatedData = $request -> validate([
            'nombres' => ['required', 'max:255'],
            'apellidos' => ['required', 'max:255'],
            'dni' => ['required', 'numeric', 'unique:users', 'digits:8'],
            'fecha_nacimiento' => ['required', 'date'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'sexo' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);


        $user= User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'email' => $request->email,
            'sexo' => $request->sexo,
            'password' => Hash::make($request->password),
        ]);


        $correo_electronico=$request->email;
        
        event(new Registered($user));

        return redirect()->route('login')->withSuccess("Se ha enviado un correo de confirmación a la casilla $correo_electronico");
    }


    public function loginUser(Request $request): RedirectResponse {

        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request -> only('email', 'password');

        if (Auth::attempt($credentials)){

            $request->session()->regenerate(); // Regenerar la sesión para evitar ataques de sesión - para evitar Session Fixation
            
            $user = Auth::user(); // Obtener el usuario autenticado

            $request -> session() -> put('user', $user); // Almaceno al usuario en la sesion persistente

            return redirect()->intended('index')->withSuccess("Sesión iniciada correctamente");
        }

        return redirect("index")->withSuccess("Los datos ingresados no coinciden con nuestro sistema");
    }


    public function logoutUser(Request $request){

        Auth::logout();

        $request -> session() -> invalidate();

        $request -> session() -> regenerateToken();

        return redirect("index")->withSuccess("Sesión cerrada correctamente. Hasta luego!");
    }
}
