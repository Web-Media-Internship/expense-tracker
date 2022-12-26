<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('reg', [
            "title" => "Register",
            "nm" => "Register"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|min:4|max:50|unique:users',
            'email' => 'required|email:dns|max:50|unique:users',
            'password' => 'required|min:5|max:50',
            'password_confirmation' => 'required_with:password|same:password'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/login');
    }
}
