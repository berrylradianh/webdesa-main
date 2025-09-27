<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 📌 Menampilkan semua user
    public function index()
    {
        $users = User::with('role')->orderBy('id', 'asc')->paginate(10); // 10 per halaman
        return view('backend.admin.kelola.user.users', compact('users'));
    }

    // 📌 Form tambah user
    public function create()
    {
        $roles = Role::all();
        return view('backend.admin.kelola.user.create', compact('roles'));
    }

    // 📌 Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('users')->with('success', 'User berhasil ditambahkan!');
    }

    // 📌 Form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.admin.kelola.user.edit', compact('user', 'roles'));
    }

    // 📌 Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users')->with('success', 'User berhasil diperbarui!');
    }

    // 📌 Hapus user
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users')->with('success', 'User berhasil dihapus!');
    }
}
