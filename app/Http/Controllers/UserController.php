<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (!punya_akses('akses_user')) return view('akses_ditolak');
        return view('users.userpage', ['users' => User::with('role')->get()]);
    }

    public function create()
    {
        if (!punya_akses('akses_user')) return view('akses_ditolak');
        return view('users.usercreate', ['roles' => Role::all()]);
    }

    public function store(Request $request)
    {
        if (!punya_akses('akses_user')) return view('akses_ditolak');
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        if (!punya_akses('akses_user')) return view('akses_ditolak');
        return view('users.useredit', ['user' => $user, 'roles' => Role::all()]);
    }

    public function update(Request $request, User $user)
    {
        if (!punya_akses('akses_user')) return view('akses_ditolak');
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        if (!punya_akses('akses_user')) return view('akses_ditolak');
        $user->delete();
        return back();
    }
}
