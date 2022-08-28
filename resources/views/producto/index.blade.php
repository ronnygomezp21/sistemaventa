@extends('adminlte::page')

@section('title', 'Lista de productos')

@section('content_header')
    <h3>Listado de Productos</h3>
    @can('crear-producto')
        <a class="btn btn-primary" href="{{ route('producto.create') }}"><i class="fa-solid fa-plus"></i></a>
    @endcan

@stop

@section('content')
    <main>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="search" name="table_search" class="form-control float-right"
                            placeholder="Busqueda por nombre">
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
                            <th style="text-align: center;">Cantidad</th>
                            <th style="text-align: center;">Precio</th>
                            <th>Categoria</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            @php
                                if ($producto->estado == 1) {
                                    $estado = 'Activo';
                                    $color = 'success';
                                } else {
                                    $estado = 'Inactivo';
                                    $color = 'danger';
                                }
                            @endphp
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->descripcion }}</td>
                                <td style="text-align: center;">{{ $producto->cantidad }}</td>
                                <td style="text-align: center;">${{ $producto->precio }}</td>
                                <td>{{ $producto->categorias->descripcion }}</td>
                                <td><span class="badge badge-{{ $color }}">{{ $estado }}</span></td>
                                <td>
                                    @can('editar-producto')
                                        <a href="" class="btn btn-warning btn-sm"><i
                                                class="fa-solid fa-pen-to-square"></i></a>&nbsp;
                                    @endcan
                                    @can('borrar-producto')
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
                {{ $productos->links() }}

                <span>{{ $productos->count() }} registros | página {{ $productos->currentPage() }} de
                    {{ $productos->lastPage() }}</span>
            </div>
        </div>
    </main>
@stop
