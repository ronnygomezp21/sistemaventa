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
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-file-invoice"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                                value="{{ old('name', $role->name) }}" placeholder="Nombre del rol" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-solid fa-list-check"></i></span>
                            </div>
                            <select name="permissions[]"
                                class="form-control @error('permissions') is-invalid @enderror select2" multiple="multiple"
                                data-placeholder="Seleccione los permisos...">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}"
                                        {{ in_array($permission->id, old('permissions', $rolePermissions, [])) ? 'selected' : '' }}>
                                        {{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('permissions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>

                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="mr-2 fa fa-save"></i>Actualizar</button>
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
            $('.select2').select2({
                width: 'resolve',
            });
        });
    </script>
@stop
