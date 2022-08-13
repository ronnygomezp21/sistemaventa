@extends('adminlte::page')

@section('title', 'Lista de categorias')

@section('content_header')
    <h3>Lista de categorias</h3>
    @can('crear-categoria')
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-agregar-categoria">
            <i class="fa-solid fa-plus"></i>
        </button>
    @endcan
@stop
@section('content')
    <livewire:categorias>
@stop
