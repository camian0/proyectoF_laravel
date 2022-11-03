@extends('layouts.base')
@section('title', 'Crear categoría')
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

    <h1 class="header"><i class="fa-solid fa-list"></i>&nbsp;Crear categoría</h1>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" placeholder="Nombre de la categoría"
                                name="name" value="{{ old('name') }}">
                            <label for="name">Nombre de la categoría</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" rows="3" name="description" value="{{ old('description') }}"></textarea>
                    </div>

                    <div class="col-sm-12 col-md-3 mt-4 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="priority" placeholder="Prioridad"
                                name="priority" value="{{ (int) old('priority') }}">
                            <label for="priority">Prioridad</label>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col sm-12 text-center">
            <button class="btn button-save" type="submit">Guardar</button>
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
