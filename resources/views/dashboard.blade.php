@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">!Bienvenido/a {{ auth()->user()->name }}!</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-primary elevation-1"><a href="{{ route('usuarios.index') }}"><i
                                class="fas fa-address-book"></i></a></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Usuarios</span>
                        <span class="info-box-number">
                            {{ $usuarios }}
                        </span>
                    </div>
                </div>
            </div> <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><a href="{{ route('clientes.index') }}"><i
                                class="fa-solid fa-users"></i></a></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Clientes</span>
                        <span class="info-box-number">
                            {{ $clientes }}
                        </span>
                    </div>
                </div>
            </div> <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><a href="{{ route('productos.index') }}"><i
                                class="fa-solid fa-box"></i></a></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Productos</span>
                        <span class="info-box-number">
                            {{ $productos }}
                        </span>
                    </div>
                </div>
            </div> <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><a href="{{ route('categorias.index') }}"><i
                                class="fa-solid fa-tag"></i></a></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Categorias</span>
                        <span class="info-box-number">
                            {{ $categorias }}
                        </span>
                    </div>
                </div>
            </div> <!-- /.col -->
        </div>
    </div>
@stop
