@extends('adminlte::page')

@section('title', __('Not Found'))

@section('content_header')
    <div></div>
@stop
@section('content')
    <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> ¡Ups! Página no encontrada.</h3>
            <h3>
                We could not find the page you were looking for.
                Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
            </h3>
        </div>
    </div>
@stop
