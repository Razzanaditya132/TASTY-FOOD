<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        if (!punya_akses('akses_roles')) return view('akses_ditolak');
        $roles = Role::all();
        return view('roles.rolespage', compact('roles'));
    }

    public function create()
    {
        if (!punya_akses('akses_roles')) return view('akses_ditolak');
        return view('roles.rolescreate');
    }

    public function store(Request $request)
    {
        if (!punya_akses('akses_roles')) return view('akses_ditolak');
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->name,
            'akses_galeri' => $request->has('akses_galeri'),
            'akses_kontak' => $request->has('akses_kontak'),
            'akses_tentang' => $request->has('akses_tentang'),
            'akses_berita' => $request->has('akses_berita'),
            'akses_roles' => $request->has('akses_roles'),
            'akses_user' => $request->has('akses_user'),
        ]);

        return redirect()->route('roles.index')->with('success', 'Role berhasil ditambahkan!');
    }

    public function edit(Role $role)
    {
        if (!punya_akses('akses_roles')) return view('akses_ditolak');
        return view('roles.rolesedit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        if (!punya_akses('akses_roles')) return view('akses_ditolak');
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update([
            'name' => $request->name,
            'akses_galeri' => $request->has('akses_galeri'),
            'akses_kontak' => $request->has('akses_kontak'),
            'akses_tentang' => $request->has('akses_tentang'),
            'akses_berita' => $request->has('akses_berita'),
            'akses_roles' => $request->has('akses_roles'),
            'akses_user' => $request->has('akses_user'),
        ]);

        return redirect()->route('roles.index')->with('success', 'Role berhasil diperbarui!');
    }

    public function destroy(Role $role)
    {
        if (!punya_akses('akses_roles')) return view('akses_ditolak');
        $role->delete();
        return redirect()->back()->with('success', 'Role berhasil dihapus!');
    }
}
