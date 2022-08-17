@extends('adminlte::page')

@section('title', 'Crear Role')

@section('content_header')
    <div class="container-fluid"></div>
@stop

@section('content')
    <main>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Editar Rol</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre rol:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="permissions">Permisos:</label>
                        <select name="permissions[]" class="form-control select2" multiple="multiple"
                            data-placeholder="Seleccione los permisos..." style="width: 100%;">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}"
                                    {{ in_array($permission->id, $rolePermissions) ? 'selected' : '' }}>
                                    {{ $permission->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </main>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop
