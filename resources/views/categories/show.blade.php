@extends('layouts.base')
@section('title', "$category->name")
@section('container')
    <style>
        .card {
            background: red;
        }

        .bottom-footer {
            margin: 1% 0;
        }
    </style>

    <h1 class="text-center"> {{ $category->name }} </h1>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <p>{{ $category->description }}</p>
        </div>

        <div class="col-sm-12 col-md-6">
            <p><b>Prioridad:</b> {{ $category->priority }} </p>

        </div>
        <div class="col-sm-12 text-center bottom-footer">
            <a href="/categories" class="btn btn-light"><i class="fa-solid fa-left-long"></i></a>
        </div>
    @endsection
