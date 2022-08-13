@extends('adminlte::page')

@section('title', __('Prohibido'))
@section('content_header')
    <div></div>
@stop
@section('content')
    <div class="error-page">
        <h2 class="headline text-danger">403</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> {{ __('Prohibido') }}</h3>

            <h3>
                {{ __('No tiene permisos para acceder a esta página.') }}
            </h3>
        </div>
    </div>
@stop
