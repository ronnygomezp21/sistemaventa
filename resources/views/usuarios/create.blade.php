@extends('adminlte::page')

@section('title', 'Crear usuario')


@section('content_header')
    <div class="container-fluid">
    </div>
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Crear Usuario</h3>
        </div>
        <div class="card-body">
            <form id="form_create_usuario" action="{{ route('usuarios.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="name">Nombres:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Correo:</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="password">Contraseña:</label>
                        <input id="password" type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="confirm_password">Confirmar contraseña:</label>
                        <input type="password" name="confirm_password"
                            class="form-control @error('confirm_password') is-invalid @enderror">
                        @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="role">Rol:</label>
                        <select name="roles" id="role" class="form-control @error('roles') is-invalid @enderror">
                            <option value="">Seleccione un rol</option>
                            @foreach ($roles as $name => $name)
                                <option  @if (old('roles') == $name) selected @endif value="{{ $name }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        @error('roles')
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
@section('js')
    <script>
        /*$(document).ready(function() {
                $("#form_create_usuario").validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 3,
                            maxlength: 50,
                            
                        },
                        email: {
                            required: true,
                            email: true,
                        },
                        password: {
                            required: true,
                            minlength: 5
                        },
                        confirm_password: {
                            required: true,
                            minlength: 5,
                            equalTo: "#password"
                        },
                        roles: {
                            required: true
                        }
                    },
                    messages: {
                        name: {
                            required: "Este campo es requerido",
                            minlength: "Este campo debe tener al menos 3 caracteres"
                        },
                        email: {
                            required: "Este campo es requerido",
                            email: "Este campo debe ser un correo valido"
                        },
                        password: {
                            required: "Este campo es requerido",
                            minlength: "Este campo debe tener al menos 6 caracteres"
                        },
                        confirm_password: {
                            required: "Este campo es requerido",
                            minlength: "Este campo debe tener al menos 6 caracteres",
                            equalTo: "Las contraseñas no coinciden"
                        },
                        roles: {
                            required: "Este campo es requerido"
                        }
                    },
                    errorElement: 'strong',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid').removeClass('is-valid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid').addClass('is-valid');
                    },
                });
            });*/
    </script>
@stop
