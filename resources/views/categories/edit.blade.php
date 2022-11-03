@extends('layouts.base')
@section('title', "Editar categoría: $category->name")
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

    <h1 class="header"> <i class="fa-solid fa-industry"></i>&nbsp;Editar Producto</h1>

    <form action="{{ route('categories.update', $category) }}" method="post">
        @csrf
        @method('put')
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" placeholder="" name="name"
                                value=" {{ old('name', $category->name) }} ">
                            <label for="name">Nombre la categoría</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" rows="3" name="description"> {{ old('description', $category->description) }} </textarea>
                    </div>

                    <div class="col-sm-12 col-md-3 mt-4 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="priority" placeholder="Prioridad"
                                name="priority" value="{{ (int) old('priority', $category->priority) }}">
                            <label for="priority">Prioridad</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col sm-12 text-center">
            <button class="btn button-save" type="submit">Actualizar</button>
            <a href="/categories" class="btn btn-light">Volver</a>
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
