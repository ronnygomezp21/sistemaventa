<div>
    @if (session()->has('messagge'))
        <div class="alert alert-{{ session('color') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('messagge') }}
        </div>
    @endif
    <div class="card card-secondary">
        <div class="card-header">
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="search" wire:model="search" class="form-control float-right" placeholder="categoria">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categorias->count())
                        @foreach ($categorias as $categoria)
                            @php
                                if ($categoria->estado == 1) {
                                    $estado = 'Activo';
                                    $color = 'success';
                                } else {
                                    $estado = 'Inactivo';
                                    $color = 'danger';
                                }
                            @endphp
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td><span class="badge badge-{{ $color }}">{{ $estado }}</span></td>
                                <td>
                                    @can('editar-categoria')
                                        <button wire:click="editar({{ $categoria->id }})" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    @endcan
                                    @can('borrar-categoria')
                                        <button wire:click="confirmar_eliminacion({{ $categoria->id }})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No hay registros</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer">

            {{ $categorias->links() }}
            <div wire:loading.class="bg-gray" wire:loading.delay>Cargando</div>
            <div>
                <span>{{ $categorias->count() }} registros | página {{ $categorias->currentPage() }} de
                    {{ $categorias->lastPage() }}</span>
            </div>
        </div>
    </div>
    <!--inicio modal agregar categoria-->
    <div wire:ignore.self class="modal fade" id="modal-agregar-categoria" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Agregar Categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" wire:submit.prevent="store">
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" wire:model.lazy="descripcion" id="descripcion"
                                class="form-control @error('descripcion') is-invalid @enderror">
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--fin modal agregar categoria-->
    <!--inicio modal confirmacion eliminar categoria-->
    <div wire:ignore.self class="modal fade" id="modal-eliminar-categoria" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Eliminar categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estas seguro de eliminar la categoria?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:clicK="destroy()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <!--fin modal confirmacion eliminar categoria-->
    @section('js')
        <script>
            window.addEventListener('cerrar_modal', event => {
                $('#modal-agregar-categoria').modal('hide');
                $('#modal-eliminar-categoria').modal('hide');
            });
            window.addEventListener('mostrar_modal_confirmacion', event => {
                $('#modal-eliminar-categoria').modal('show');
            });
        </script>
    @stop
</div>
