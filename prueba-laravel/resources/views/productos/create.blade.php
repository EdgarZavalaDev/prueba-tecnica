@extends('app')

@section('contenido')
<div class="container">
    <div class="alert alert-info text-center mt-5"><h5>Nuevo producto</h5>Todos los campos con * son obligatorios</div>
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
                    <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nombre del producto *</label>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Precio del producto *</label>
                            <input type="number" class="form-control" name="precio" value="{{ old('precio') }}" step=".01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cantidad del producto *</label>
                            <input type="number" class="form-control" name="cantidad" value="{{ old('cantidad') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imagen del producto</label>
                            <input type="file" class="form-control" name="imagen" accept=".png, .jpg, .jpeg">
                        </div>
                        <button type="submit" class="btn btn-success">Registrar producto</button>
                        <a href="{{ route('productos.index') }}" class="btn btn-default">Regresar al listado</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
