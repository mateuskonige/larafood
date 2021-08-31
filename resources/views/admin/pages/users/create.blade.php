@extends('adminlte::page')

@section('title', 'Cadastrar novo usuário')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
          <li class="breadcrumb-item active" aria-current="page">Criar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Cadastrar novo usuário</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('users.store') }}" class="form" method="POST">
            @csrf

            @include('admin.pages.users._partials.form')
        </form>
    </div>
@stop
