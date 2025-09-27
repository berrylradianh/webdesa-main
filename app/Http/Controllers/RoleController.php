<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backend.admin.kelola.role.role', compact('roles'));
    }

    public function create()
    {
        return view('backend.admin.kelola.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create($request->all());

        return redirect()->route('roles')->with('success', 'Role berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('backend.admin.kelola.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:roles,name,' . $id
        ]);

        $role->update($request->all());

        return redirect()->route('roles')->with('success', 'Role berhasil diperbarui.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles')->with('success', 'Role berhasil dihapus.');
    }
}
