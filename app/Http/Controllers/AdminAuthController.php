<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    // Menampilkan halaman login untuk Admin
    public function showLoginForm()
    {
        return view('auth.login_admin');
    }

    // Proses login untuk Admin
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login.admin')
                ->withErrors($validator)
                ->withInput();
        }

        // Cek login untuk Admin
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard'); // Redirect ke dashboard admin setelah login berhasil
        }

        return redirect()->route('login.admin')->withErrors(['login' => 'Email atau password salah']);
    }
}

