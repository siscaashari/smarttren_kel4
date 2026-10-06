<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar user (8.2 Read)
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Menyimpan user baru (8.1 Create)
    public function store(Request $request)
    {
        User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect()->route('users.index');
    }

    // Menghapus user (8.4 Delete)
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}