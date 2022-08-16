@extends('adminlte::page')

@section('title', 'Crear Role')

@section('content_header')
    <div class="container-fluid">
    </div>
@stop

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Crear Rol</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre rol:</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="permissions">Permisos:</label>
                    <select name="permissions[]" class="form-control @error('permissions') is-invalid @enderror select2"
                        multiple="multiple" data-placeholder="Seleccione los permisos..." style="width: 100%;">
                        @foreach ($permissions as $permission)
                            <option @if (in_array($permission->id, old('permissions', []))) selected @endif value="{{ $permission->id }}">
                                {{ $permission->name }}</option>
                        @endforeach
                    </select>
                    @error('permissions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </form>
        </div>
        <div class="card-footer"></div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop
