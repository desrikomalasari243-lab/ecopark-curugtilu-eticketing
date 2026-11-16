<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showPetugasLoginForm()
    {
        return view('login-petugas');
    }

    public function loginWisatawan(Request $request)
    {
        $request->validate([
            'username' => ['required'],
        ]);

        return redirect('/wisatawan');
    }

    public function loginPetugas(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Menggunakan guard 'petugas' agar mengecek ke tabel petugas
        if (Auth::guard('petugas')->attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::guard('petugas')->user();
            $peran = $user->role ?? '';

            // ARAHKAN BERDASARKAN ROLE DI DATABASE
            if ($peran == 'admin') {
                return redirect('/admin');
            } elseif ($peran == 'petugas' || $peran == 'petugas_gate') {
                return redirect('/gate');
            } elseif ($peran == 'manajer' || $peran == 'pemilik') {
                return redirect('/manajer');
            } else {
                Auth::guard('petugas')->logout();
                return back()->withErrors(['email' => 'Role pada akun ini belum diatur dengan benar.']);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
