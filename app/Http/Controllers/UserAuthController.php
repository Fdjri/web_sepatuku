<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    // Menampilkan halaman login untuk User
    public function showLoginForm()
    {
        return view('auth.login_customer');
    }

    // Proses login untuk User
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login.customer')
                ->withErrors($validator)
                ->withInput();
        }

        // Proses login User
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.dashboard');
        }

        return redirect()->route('login.customer')->withErrors(['login' => 'Email atau password salah']);
    }

    // Proses logout untuk User
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login.customer');
    }
}
