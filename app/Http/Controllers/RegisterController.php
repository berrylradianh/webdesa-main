<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class RegisterController extends Controller
{
    // Tampilkan form registrasi
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses registrasi (default role = warga)
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $role = Role::where('name', 'warga')->first();

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role->id,
        ]);

        session([
            'user_id' => $user->id,
            'role' => $role->name,
        ]);

        if ($role->name === 'admin') {
            return redirect()->route('dashboardadmin')->with('success', 'Registrasi berhasil, selamat datang ' . $user->username);
        } elseif ($role->name === 'perangkatdesa') {
            return redirect()->route('dashboardperangkat')->with('success', 'Registrasi berhasil, selamat datang ' . $user->username);
        } else {
            return redirect()->route('home')->with('success', 'Registrasi berhasil, selamat datang ' . $user->username);
        }
    }
}
