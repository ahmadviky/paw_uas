<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
//halaman login
{
    public function login()
    {
        return view('login');
    }
    //fungsi login
    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);
        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('alert', [
            'type' => 'danger',
            'message' => 'invalid username or password'
        ]);
    }
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    //halaman register
    public function register()
    {
        return view('register');
    }
    //fungsi register
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => ['required', 'string', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
            'confirm_password' => ['required', 'string', 'same:password']
        ]);
        $user = User::create($validateData);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
}
