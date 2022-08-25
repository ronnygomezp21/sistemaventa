@extends('adminlte::page')

@section('title', 'Perfil')


@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}">
                    </div>
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                    <p class="text-muted text-center">{{ Auth::user()->adminlte_desc() }}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#perfil" data-toggle="tab">Perfil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contraseña" data-toggle="tab">Contraseña</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="perfil">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>

                                            <input id="name" type="text" class="form-control" name="name"
                                                value="" placeholder="Nombres y Apellidos" wire:model.defer="name"
                                                required="">

                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                            </div>

                                            <input id="name" type="text" class="form-control" name="name"
                                                value="" placeholder="Correo" wire:model.defer="name"
                                                required="">

                                        </div>
                                    </div>
                                </div>
                                <button wire:loading.attr="disabled" type="submit" class="btn btn-primary btn-sm">
                                    <i class="mr-2 fa fa-save"></i>Actualizar
                                </button>
                            </form>
                        </div>
                        <div class="tab-pane" id="contraseña">
                            <form wire:submit.prevent="updatePassword">
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" wire:model.defer="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirmar</label>
                                    <div class="col-sm-10">
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="password_confirmation" wire:model.defer="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@stop
