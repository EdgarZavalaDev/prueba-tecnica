@extends('app')

@section('contenido')
<div class="container">
    <div class="alert alert-info text-center mt-5"><h5>Ver producto</h5></div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-info text-center">{{ $producto->nombre }}</div>
                    <ul>
                        <li>
                            @if(!empty($producto->imagen))
                                <img src="{{ asset('storage/' . $producto->imagen) }}" width="80px" alt="{{ $producto->nombre }}">
                            @else
                                Imagen no disponible
                            @endif
                        </li>
                        <li>Precio: ${{ $producto->precio }}</li>
                        <li>Cantidad: {{ $producto->cantidad }}</li>
                    </ul>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Regresar al listado</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
