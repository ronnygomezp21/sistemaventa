<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="search" name="table_search" class="form-control float-right" placeholder="Buscar">
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
                        <th>ID</th>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        @php
                            if ($cliente->estado == 1) {
                                $estado = 'Activo';
                                $color = 'success';
                            } else {
                                $estado = 'Inactivo';
                                $color = 'danger';
                            }
                        @endphp
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->cedula }}</td>
                            <td>{{ $cliente->nombres }}</td>
                            <td>{{ $cliente->apellidos }}</td>
                            <td>{{ $cliente->correo }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td><span class="badge badge-{{ $color }}">{{ $estado }}</span></td>
                            <td>
                                @can('editar-cliente')
                                    <a class="btn btn-warning btn-sm" href="">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>&nbsp;
                                @endcan
                                @can('borrar-cliente')
                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        {{ $clientes->links() }}
                    </div>
                    <span>{{ $clientes->count() }} registros | página {{ $clientes->currentPage() }} de
                        {{ $clientes->lastPage() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
