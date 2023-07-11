<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator, Hash, DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        if(!Auth::attempt($credentials)){
           throw ValidationException::withMessages([
            'password' => "Usuario no registrado o credenciales invalidas."
           ]); 
        };

        $request->session()->regenerate();

        if(Auth::user()->rol == 0) {
            return redirect()->route('admin');
        } else {
            return redirect()->intended()->with('status', 'Sesion correctamente iniciada.');
        }
    }
}
