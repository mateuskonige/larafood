@extends('adminlte::page')

@section('title', "Editar mesa $table->identify")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('tables.index') }}">Mesas</a></li>
          <li class="breadcrumb-item active" aria-current="page">Editar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Editar mesa <b>{{ $table->identify }}</b></h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('tables.update', $table->id) }}" class="form" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.tables._partials.form')
        </form>
    </div>
@stop
