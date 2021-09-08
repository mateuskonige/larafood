@extends('adminlte::page')

@section('title', "Editar produto $product->title")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
          <li class="breadcrumb-item active" aria-current="page">Editar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Editar produto <b>{{ $product->title }}</b></h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('products.update', $product->id) }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.pages.products._partials.form')
        </form>
    </div>
@stop
