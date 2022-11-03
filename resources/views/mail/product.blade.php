@extends('layouts.base')
@section('title', "$product->name")
@section('container')
    <style>
        .card {
            background: red;
        }

        .bottom-footer {
            margin: 1% 0;
        }
    </style>

    <h1 class="text-center"> {{ $product->name }} </h1>
    <div class="row col-12 text-center">
        <div class="embed-responsive embed-responsive-16by9">
            <img class="img-fluid" src="{{ $product->image }} " alt="producto">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <p>{{ $product->description }}</p>
        </div>

        <div class="col-sm-12 col-md-5 offset-md-1">
            <p><b>Categoría:</b> {{ $product->category->name }} </p>
        </div>
        <div class="col-sm-12 col-md-5 offset-md-1">
            <p><b>Cantidad:</b> {{ $product->quantity_and_measure }} </p>
        </div>
        <div class="col-sm-12 col-md-5 offset-md-1">
            <p><b>Fecha de expiración:</b> {{ $product->expiration_date }} </p>
        </div>
        <div class="col-sm-12 col-md-5 offset-md-1">
            <p><b>Número de lote: </b> {{ $product->lot_number }} </p>
        </div>
        <div class="col-sm-12 text-center bottom-footer">
            <a href="/products" class="btn btn-light"><i class="fa-solid fa-left-long"></i></a>
        </div>
    </div>
@endsection
