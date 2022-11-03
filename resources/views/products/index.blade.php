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
            /* color: white; */
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


    <h1 class="title">Productos</h1>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    {{-- @auth --}}
    <a href="{{ route('products.create') }}" class="btn button-add"><i class="fa-solid fa-circle-plus"></i></a>
    {{-- @endauth --}}


    @foreach ($products as $product)
        <div class="card">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <img src="{{ $product->image }} " style="max-height: 380px; width: auto"
                        class="card-img-top img-fluid" alt="imagen producto">
                </div>
                <div class="col-sm-8">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $product->name }} </h5>
                        <p class="card-text">
                            {{ $product->description }}
                            <br>
                            Cantidad: {{ $product->quantity_and_measure }}
                        </p>
                        <div class="bottom text-end">
                            {{-- @auth --}}
                            <a href=" {{ route('products.edit', $product) }} " class="btn button-edit"><i
                                    class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('products.destroy', $product) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn button-delete" style="display: inline-block"
                                    onclick="return confirm('¿Seguro de borrar el producto {{ $product->name }}?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            {{-- @endauth --}}


                            <a href="{{ route('products.show', $product) }}" class="btn button-show"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="#" class="btn button-cart"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
{{-- @endsection --}}
