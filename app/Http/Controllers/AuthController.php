<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data_login = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $user = User::where('username', '=', $request->username)->first();
        if (isset($user)) {
            if (Auth::attempt($data_login)) {
                $request->session()->regenerate();
                $request->session()->put('data_user', $data_login);
                return redirect()->intended('/');
            } else {
                return back()->with('loginError', 'NIP atau Password Salah!');
            }
        } else {
            return back()->with('loginError', 'NIP atau Password Salah!');
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->forget('data_user');

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
