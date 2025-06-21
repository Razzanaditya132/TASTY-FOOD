<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.loginpage');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['email' => 'Email dan password anda salah.']);
        }

        if (!$user->is_active) {
            return back()->with('inactive', 'Akun anda tidak aktif. Beritahu admin segera.');
        }

        Auth::login($user);
        return redirect()->route('home')->with('success', 'login');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
