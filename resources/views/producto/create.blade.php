@extends('adminlte::page')

@section('title', 'Crear Producto')


@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="form_create_cliente" action="{{ route('producto.store') }}" method="post">
                @csrf
                <div class="row g-2">
                    <div class="form-group col-md-5">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion"
                            class="form-control @error('descripcion') is-invalid @enderror" autofocus
                            value="{{ old('descripcion') }}">
                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad"
                            class="form-control @error('cantidad') is-invalid @enderror" placeholder="0"
                            value="{{ old('cantidad') }}">
                        @error('cantidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" id="precio"
                            class="form-control @error('precio') is-invalid @enderror" placeholder="0.00" step="0.01"
                            value="{{ old('precio') }}">
                        @error('precio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="id_categoria">Categoria</label>
                        <select class="form-control @error('id_categoria') is-invalid @enderror" name="id_categoria">
                            <option value="">Selecciona una Categoría...</option>
                            @foreach ($categorias as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('id_categoria') == $category->id ? 'selected' : '' }}>
                                    {{ $category->descripcion }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_categoria')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <a class="btn btn-danger" href="{{ route('productos.index') }}">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@stop
@section('css')
    <style>

    </style>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $("#form_create_cliente").validate({
                rules: {
                    descripcion: {
                        required: true,
                        minlength: 3,
                    },
                    cantidad: {
                        required: true,
                        min: 1
                    },
                    precio: {
                        required: true,
                        min: 0.01
                    },
                    id_categoria: {
                        required: true
                    }
                },
                messages: {
                    descripcion: {
                        required: "Este campo es requerido",
                        minlength: "Este campo debe tener al menos 3 caracteres"
                    },
                    cantidad: {
                        required: "Este campo es requerido",
                        min: "Este campo debe ser mayor a 0"
                    },
                    precio: {
                        required: "Este campo es requerido",
                        min: "Este campo debe ser mayor a 0"
                    },
                    id_categoria: {
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
        });
    </script>
@stop
