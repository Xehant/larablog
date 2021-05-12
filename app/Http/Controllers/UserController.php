<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function register()
    {
        return view('users.register');
    }
    
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        
        return redirect()->route('login');
    }
    
    public function login()
    {
        return view('users.login');
    }
    
    public function signin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        $rememberMe = $request->input('remember_me');
        $rememberMe = $rememberMe === 'on';
        
        if (Auth::attempt($credentials, $rememberMe)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'credentials' => 'Les identifiants ne correspondent pas'
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
    
    public function index()
    {
        return view('users.index');
    }
}
