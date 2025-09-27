<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    // Login view
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::with('role')->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Email atau password salah!');
        }

        // Simpan session
        session([
            'user_id' => $user->id,
            'role' => $user->role->name,
        ]);

        if ($user->role->name === 'admin') {
            return redirect()->route('dashboardadmin')->with('success', 'Selamat datang ' . $user->username);
        } elseif ($user->role->name === 'perangkatdesa') {
            return redirect()->route('dashboardperangkat')->with('success', 'Selamat datang ' . $user->username);
        } else {
            return redirect()->route('home')->with('success', 'Selamat datang ' . $user->username);
        }

    }

    public function logout()
    {
        session()->forget(['user_id', 'role']);
        session()->flush();

        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}
