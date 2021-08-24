@extends('adminlte::page')

@section('title', "Editar permissão $permission->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
          <li class="breadcrumb-item active" aria-current="page">Editar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Editar permissão <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.permissions._partials.form')
        </form>
    </div>
@stop
