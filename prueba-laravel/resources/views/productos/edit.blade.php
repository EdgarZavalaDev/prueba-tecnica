@extends('app')

@section('contenido')
<div class="container">
    <div class="alert alert-info text-center mt-5"><h5>Editar producto</h5>Todos los campos con * son obligatorios</div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('productos.update', $producto->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control" name="nombre" value="{{ $producto->nombre }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Precio del producto</label>
                            <input type="number" class="form-control" name="precio" value="{{ $producto->precio }}" step=".01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cantidad del producto</label>
                            <input type="number" class="form-control" name="cantidad" value="{{ $producto->cantidad }}">
                        </div>
                        <div class="d-flex justify-content-around mb-3">
                            @if(!empty($producto->imagen))
                                <img src="{{ asset('storage/' . $producto->imagen) }}" width="80px" alt="{{ $producto->nombre }}">
                            @else
                                <span><b>Imagen no disponible</b></span>
                            @endif
                            <div class="w-75">
                                <label class="form-label">Imagen del producto</label>
                                <input type="file" class="form-control" name="imagen" accept=".png, .jpg, .jpeg">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Editar producto</button>
                        <a href="{{ route('productos.index') }}" class="btn btn-default">Regresar al listado</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
