@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Usuarios</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol actual</th>
                <th>Actualizar rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->role }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.usuarios.actualizarRol', $usuario) }}">
                            @csrf
                            <select name="role" class="form-control d-inline w-50">
                                <option value="admin" {{ $usuario->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="contador" {{ $usuario->role === 'contador' ? 'selected' : '' }}>Contador</option>
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
