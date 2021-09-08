@extends('adminlte::page')

@section('title', 'Cadastrar nova mesa')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('tables.index') }}">Mesas</a></li>
          <li class="breadcrumb-item active" aria-current="page">Criar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Cadastrar nova mesa</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('tables.store') }}" class="form" method="POST">
            @csrf

            @include('admin.pages.tables._partials.form')
        </form>
    </div>
@stop
