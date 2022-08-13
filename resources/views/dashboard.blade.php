@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Inicio</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            @can('ver-usuario')
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $usuarios }}</h3>
                            <p>Usuarios Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <a href="{{ route('usuarios.index') }}" class="small-box-footer"><i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endcan
            <!-- ./col -->
            @can('ver-producto')
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $productos }}</h3>
                            <p>Productos Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fa-brands fa-product"></i>
                        </div>
                        <a href="{{ route('productos.index') }}" class="small-box-footer"><i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endcan
            @can('ver-cliente')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>2</h3>
                        <p>Clientes Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="small-box-footer"><i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('ver-cliente')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>2</h3>
                        <p>Clientes Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="small-box-footer"><i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('ver-cliente')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>2</h3>
                        <p>Clientes Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="small-box-footer"><i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        
        @can('ver-cliente')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>2</h3>
                        <p>Clientes Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="small-box-footer"><i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        </div>
    </div>
@stop
