@extends('adminlte::page')

@section('title', 'Cadastrar nova regra')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('rules.index') }}">Regras</a></li>
          <li class="breadcrumb-item active" aria-current="page">Criar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Cadastrar novo perfil</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('rules.store') }}" class="form" method="POST">
            @csrf

            @include('admin.pages.rules._partials.form')
        </form>
    </div>
@stop
