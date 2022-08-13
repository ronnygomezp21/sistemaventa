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
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="font-size: 15px" class="table table-striped table-hover table-sm" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th style="text-align: center;" scope="col">Nombre</th>
                                <th style="text-align: center;" scope="col">Cantidad</th>
                                <th style="text-align: center;" scope="col">Precio</th>
                                <th style="text-align: center;" scope="col">Categoria</th>
                                <th style="text-align: center;" scope="col">estado</th>
                                <th colspan="2" style="text-align: center;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row">{{ $producto->id }}</th>
                                    <td style="text-align: center;"> {{ $producto->descripcion }}</td>
                                    <td style="text-align: center;">{{ $producto->cantidad }}</td>
                                    <td style="text-align: center;">${{ $producto->precio }}</td>
                                    <td style="text-align: center;">{{ $producto->categorias->descripcion }}</td>
                                    <td style="text-align: center;">{{ $producto->estado }}</td>
                                    <td style="text-align: center;">
                                        @can('editar-producto')
                                        <a href="" class="btn btn-warning btn-sm"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        @endcan
                                        @can('borrar-producto')
                                        <a href="" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash-can"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-left">
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </main>
@stop
