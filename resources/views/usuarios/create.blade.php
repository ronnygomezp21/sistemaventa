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
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Nombres y Apellidos" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="Correo" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input id="password" type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña"
                                required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-redo"></i></span>
                            </div>
                            <input type="password" name="confirm_password"
                                class="form-control @error('confirm_password') is-invalid @enderror"
                                placeholder="Vuelva a ingresar la contraseña" required>
                            @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-file-invoice"></i></span>
                            </div>
                            <select name="roles" id="role" class="form-control @error('roles') is-invalid @enderror"
                                required>
                                <option value="">Seleccione un rol...</option>
                                @foreach ($roles as $name => $name)
                                    <option @if (old('roles') == $name) selected @endif value="{{ $name }}">
                                        {{ $name }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="mr-2 fa fa-save"></i>Guardar
                        </button>
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
