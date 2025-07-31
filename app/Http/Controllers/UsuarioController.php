<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function actualizarRol(Request $request, User $usuario)
    {
        $request->validate([
            'role' => 'required|in:admin,contador'
        ]);

        $usuario->role = $request->role;
        $usuario->save();

        return redirect()->route('admin.usuarios.index')->with('success', 'Rol actualizado correctamente.');
    }
}
