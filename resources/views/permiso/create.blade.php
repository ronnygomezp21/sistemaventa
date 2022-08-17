@extends('adminlte::page')

@section('title', 'Crear Permiso')


@section('content_header')
    <div class="container-fluid">
    </div>
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Crear Permiso</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('permisos.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
