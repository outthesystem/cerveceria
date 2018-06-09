<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;

class AuthController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest')->except('logout');
  }

    public function login()
    {

      return view('backend.views.auth.login');
    }

    public function register()
    {
      return view('backend.views.auth.register');
    }

    public function authenticate(Request $request)
    {
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/dashboard');
        } else {
            Session::flash('error', 'Las credenciales son incorrectas');
            return redirect('/login');
        }
    }

    public function signup(Request $request)
    {
      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
      ]);

      Auth::attempt(['email' => $request->email, 'password' => $request->password]);

      Session::flash('success', 'Ya tienes tu cuenta! :) Por favor ingresa tus credenciales.');

      return redirect('/dashboard');
    }
}
