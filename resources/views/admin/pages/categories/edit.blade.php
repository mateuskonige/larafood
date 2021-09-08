@extends('adminlte::page')

@section('title', "Editar categoria $category->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
          <li class="breadcrumb-item active" aria-current="page">Editar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Editar categoria <b>{{ $category->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('categories.update', $category->id) }}" class="form" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.categories._partials.form')
        </form>
    </div>
@stop
