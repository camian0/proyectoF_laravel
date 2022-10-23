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
    </style>

    <h1 class="title">Productos</h1>


    <div class="card">
        <div class="row">
            <div class="col-sm-4">
                <img src="https://enciclopediaeconomica.com/wp-content/uploads/2021/10/icono-producto.jpg"
                    class="card-img-top" alt="imagen producto">
            </div>
            <div class="col-sm-8">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium quaerat consequuntur voluptatem
                        nam quisquam quod tenetur dicta, hic magnam veritatis voluptates ut. Esse non omnis voluptatem? Enim
                        doloribus recusandae quaerat.
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>

@endsection
