{{-- @extends('layouts.base') --}}
{{-- @section('title', 'Lista de productos') --}}
{{-- @section('container') --}}
<x-app-layout>
    <style>
        .title {
            margin-bottom: 30px;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
        }

        .product-image {
            max-width: 400px;
        }

        .card {
            margin: 25px 0;
        }

        .bottom {
            margin: 5px;
            display: flex;
            align-content: center;
            justify-content: flex-end;
        }

        .bottom a {
            margin: 0 5px;
        }

        .button-show {
            color: rgb(71, 207, 59);
        }

        .button-cart {
            color: rgb(196, 191, 191);
        }

        .button-add {
            color: rgb(19, 146, 231);
        }

        .button-edit {
            color: rgb(221, 129, 8);
        }

        .button-delete {
            color: red;
        }
    </style>


    <h1 class="title">Categorias</h1>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <a href="{{ route('categories.create') }}" class="btn button-add"><i class="fa-solid fa-circle-plus"></i></a>

    <div class="table-responsive">
        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td> {{ $category->name }} </td>
                        <td> {{ $category->description }} </td>
                        <td>
                            <div class="bottom text-end">
                                {{-- @auth --}}
                                <a href=" {{ route('categories.edit', $category) }} " class="btn button-edit"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('categories.destroy', $category) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn button-delete" style="display: inline-block"
                                        onclick="return confirm('¿Seguro de borrar la categoría {{ $category->name }}?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                {{-- @endauth --}}


                                <a href="{{ route('categories.show', $category) }}" class="btn button-show"><i
                                        class="fa-solid fa-eye"></i></a>
                                <a href="#" class="btn button-cart"><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
{{-- @endsection --}}
