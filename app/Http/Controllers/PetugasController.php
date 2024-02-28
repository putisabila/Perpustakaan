<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'petugas')->get();
        return view('petugas.petugas', compact('users'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'alamat' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'role' => 'petugas',
        ]);

        return redirect()->route('petugas.index')->with('success', 'User petugas berhasil dibuat');
    }

    public function edit(User $user)
    {
        return view('petugas.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'alamat' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('petugas.index')->with('success', 'User petugas berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('petugas.index')->with('success', 'User petugas berhasil dihapus');
    }
}
