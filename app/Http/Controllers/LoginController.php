<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            "title" => "Login"
        ]);
    }

    public function login(Request $request)
    {
        $crdts = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($crdts)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('logerror', 'wrong username or password');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
