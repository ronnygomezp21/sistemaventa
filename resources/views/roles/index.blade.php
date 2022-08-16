@extends('adminlte::page')

@section('title', 'Lista de roles')

@section('content_header')
    <h3>Listado de roles</h3>
    @can('crear-rol')
        <a class="btn btn-info" href="{{ route('roles.create') }}"><i class="fa-solid fa-plus"></i></a>
    @endcan
@stop

@section('content')
    @if (session('mensaje'))
        <div class="alert alert-{{ session('color') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('mensaje') }}
        </div>
    @endif
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
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                            <tr>
                                <td>{{ $rol->id }}</td>
                                <td>{{ $rol->name }}</td>
                                <td>
                                    @can('editar-rol')
                                        <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning btn-sm"><i
                                                class="fa-solid fa-pen-to-square"></i></a>&nbsp;
                                    @endcan
                                    @can('borrar-rol')
                                        <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" class="d-inline">
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
                {{ $roles->links() }}

                <span>{{ $roles->count() }} registros | página {{ $roles->currentPage() }} de
                    {{ $roles->lastPage() }}</span>
            </div>
        </div>
    </main>
@stop
