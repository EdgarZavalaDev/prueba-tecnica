@extends('app')

@section('contenido')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="opacity: 0" id="alert-response">
        <strong>Éxito! </strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container">
    <div class="alert alert-info text-center mt-3"><h5>Listado de productos</h5></div>
    <div class="d-block text-center mb-3">
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo producto</a>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                <table class="w-100 text-center table-hover table-bordered table-primary">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @if(!empty($productos))
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->id }}</td>
                                    <td>
                                        @if(!empty($producto->imagen))
                                            <img src="{{ asset('storage/' . $producto->imagen) }}" width="80px" alt="{{ $producto->nombre }}">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>${{ $producto->precio }}</td>
                                    <td>{{ $producto->cantidad }}</td>
                                    <td width="30%" class="p-2">
                                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">Ver</a>
                                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">Editar</a>
                                        <form class="d-inline" method="POST" action="{{ route('productos.destroy', $producto->id) }}">{{ csrf_field() }}<input name="_method" type="hidden" value="DELETE"><button type="submit" class="btn btn-danger">Eliminar</button></form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">Sin registros</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    @if(session('success'))
        document.getElementById("alert-response").style.opacity = "1";
        setTimeout(() => {
            document.getElementById("alert-response").style.opacity = "0";
        }, 3000);
    @endif
</script>
@endsection
