@extends('layouts.base')
@section('title', 'Crear producto')
@section('container')
    <style>
        .header {
            padding: 20px;
            background: rgba(245, 245, 245, 0.52);
            margin-bottom: 3%;
            border-radius: 3px
        }

        textarea {
            resize: none;
        }

        .button-save {
            background-color: rgb(71, 207, 59);
            color: white;
        }
    </style>

    <h1 class="header"> <i class="fa-solid fa-industry"></i>&nbsp;Crear Producto</h1>

    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" placeholder="" name="name"
                                value=" {{ old('name') }} ">
                            <label for="name">Nombre del producto</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" rows="3" name="description" value=" {{ old('description') }} "></textarea>
                    </div>
                    <div class="col-sm-12 col-md-6 mt-1 mb-3">
                        <label for="category_id">Selecciona una categoría</label>
                        <select class="form-select form-select-lg" id="category_id" aria-label="Selecciona una categoría"
                            name="category_id" value=" {{ (int) old('category_id') }} ">
                            <option></option>
                            @foreach ($categories as $category)
                                <option value=" {{ $category->id }} ">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-3 mt-4 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="quantity" placeholder="Cantidad" name="quantity"
                                value=" {{ (int) old('quantity') }} ">
                            <label for="quantity">Cantidad</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 mt-1 mb-3">
                        <label for="measure">Selecciona la medida</label>
                        <select class="form-select form-select-lg" id="measure" aria-label="Selecciona una medida"
                            name="measure" value=" {{ old('measure') }} ">
                            <option selected value="L">L (Litros)</option>
                            <option value="ml">ml (Mililitros)</option>
                            <option value="Capsulas">Capsulas</option>
                            <option value="g">g (Gramos)</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="expiration_date" placeholder=""
                                name="expiration_date" value=" {{ old('expiration_date') }} ">
                            <label for="expiration_date">Fecha de expiración</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="lot_number" placeholder="" name="lot_number"
                                value=" {{ old('lot_number') }} ">
                            <label for="lot_number">Número de lote</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col sm-12 text-center">
            <button class="btn button-save" type="submit">Guardar</button>
            <a href="/products" class="btn btn-light">Volver</a>
        </div>

        <div class="m-4">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif
        </div>
    </form>
@endsection
