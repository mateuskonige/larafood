@extends('adminlte::page')

@section('title', 'Cadastrar nova permissão')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
          <li class="breadcrumb-item active" aria-current="page">Criar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Cadastrar nova permissão</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('permissions.store') }}" class="form" method="POST">
            @csrf

            @include('admin.pages.permissions._partials.form')
        </form>
    </div>
@stop
