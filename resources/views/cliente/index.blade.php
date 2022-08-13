@extends('adminlte::page')

@section('title', 'Lista de clientes')

@section('content_header')
    <div><br>
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
                {{ session('error') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> ¡Éxito!</h4>
                {{ session('success') }}
            </div>
        @endif
    </div>
@stop

@section('content')
    <main>
        <livewire:clientes>
    </main>
@stop
