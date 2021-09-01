@extends('adminlte::page')

@section('title', "Editar usuário $user->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
          <li class="breadcrumb-item active" aria-current="page">Editar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Editar usuário <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.users._partials.form')
        </form>
    </div>
@stop
