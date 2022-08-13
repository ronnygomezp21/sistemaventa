@extends('adminlte::page')

@section('title', 'Lista de usuarios')

@section('content_header')
    <h3>Listado de usuarios</h3>
    @can('crear-usuario')
        <a class="btn btn-info" href="{{ route('usuarios.create') }}"><i class="fa-solid fa-plus"></i></a>
    @endcan
@stop

@section('content')
    <main>
        <div class="card card-secondary">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            @php
                                if ($usuario->estado == 1) {
                                    $estado = 'Activo';
                                    $color = 'success';
                                } else {
                                    $estado = 'Inactivo';
                                    $color = 'danger';
                                }
                            @endphp
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    @foreach ($usuario->roles as $rol)
                                        {{ $rol->name }}
                                    @endforeach
                                </td>
                                <td><span class="badge badge-{{ $color }}">{{ $estado }}</span></td>
                                <td>
                                    @can('editar-usuario')
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm"><i
                                                class="fa-solid fa-pen-to-square"></i></a>&nbsp;
                                    @endcan
                                    @can('borrar-usuario')
                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $usuarios->links() }}
            </div>
        </div>
        </div>
    </main>
@stop
