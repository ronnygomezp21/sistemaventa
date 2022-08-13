<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="row g-2">
                    <div class="form-group col-md-4">
                        <label for="cedula">Cedula</label>
                        <input type="text" wire:model="cedula" id="cedula"
                            class="form-control @error('cedula') is-invalid @enderror" autofocus>
                        @error('cedula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nombres">Nombres</label>
                        <input type="text" wire:model.lazy="nombres" id="nombres"
                            class="form-control @error('nombres') is-invalid @enderror" autofocus>
                        @error('nombres')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="form-group col-md-4">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" wire:model.lazy="apellidos" id="apellidos"
                            class="form-control @error('apellidos') is-invalid @enderror" autofocus>
                        @error('apellidos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="correo">Correo</label>
                        <input type="text" wire:model.lazy="correo" id="correo"
                            class="form-control @error('correo') is-invalid @enderror" autofocus>
                        @error('correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="form-group col-md-4">
                        <label for="telefono">Telefono</label>
                        <input type="text" wire:model.lazy="telefono" id="telefono"
                            class="form-control @error('telefono') is-invalid @enderror" autofocus>
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="direccion">Direccion</label>
                        <input type="text" wire:model.lazy="direccion" id="direccion"
                            class="form-control @error('direccion') is-invalid @enderror" autofocus>
                        @error('direccion')
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
    </div>
</div>
