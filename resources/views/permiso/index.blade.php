@extends('adminlte::page')

@section('title', 'Lista de permisos')

@section('content_header')
    <h3>Lista de permisos</h3>
    @can('crear-permiso')
        <button type="button" class="btn btn-info">
            <i class="fa-solid fa-plus"></i>
        </button>
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
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permisos as $permiso)
                        <tr>
                            <td>{{ $permiso->id }}</td>
                            <td>{{ $permiso->name }}</td>
                            <td>
                                @can('editar-permiso')
                                    <a href="" class="btn btn-warning btn-sm"><i
                                            class="fa-solid fa-pen-to-square"></i></a>&nbsp;
                                @endcan
                                @can('borrar-permiso')
                                    <form action="" method="POST" class="d-inline">
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
            {{ $permisos->links() }}
        </div>
    </div>
</main>
@stop
