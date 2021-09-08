@extends('adminlte::page')

@section('title', 'Cadastrar novo produto')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
          <li class="breadcrumb-item active" aria-current="page">Criar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Cadastrar novo produto</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('products.store') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf

            @include('admin.pages.products._partials.form')
        </form>
    </div>
@stop
