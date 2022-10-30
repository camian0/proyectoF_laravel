@extends('layouts.base')
@section('title', 'Lista de productos')
@section('container')
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
        }

        .button-show {
            background-color: rgb(71, 207, 59);
            color: white;
        }

        .button-cart {
            background-color: rgb(227, 225, 225);
        }
    </style>

    <h1 class="title">Productos</h1>

    @foreach ($products as $product)
        <div class="card">
            <div class="row">
                <div class="col-sm-4">
                    <img src="https://enciclopediaeconomica.com/wp-content/uploads/2021/10/icono-producto.jpg"
                        class="card-img-top" alt="imagen producto">
                </div>
                <div class="col-sm-8">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $product->name }} </h5>
                        <p class="card-text">
                            {{ $product->description }}
                            <br>
                            Cantidad: {{ $product->quantity_and_measure }}
                        </p>
                    </div>
                    <div class="bottom text-end">
                        <a href="#" class="btn button-show"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="btn button-cart"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
