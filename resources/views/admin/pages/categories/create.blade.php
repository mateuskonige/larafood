@extends('adminlte::page')

@section('title', 'Cadastrar novo categoria')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
          <li class="breadcrumb-item active" aria-current="page">Criar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Cadastrar nova categoria</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('categories.store') }}" class="form" method="POST">
            @csrf

            @include('admin.pages.categories._partials.form')
        </form>
    </div>
@stop
