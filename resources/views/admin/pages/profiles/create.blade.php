@extends('adminlte::page')

@section('title', 'Cadastrar novo perfil')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
          <li class="breadcrumb-item active" aria-current="page">Criar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Cadastrar novo perfil</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('profiles.store') }}" class="form" method="POST">
            @csrf

            @include('admin.pages.profiles._partials.form')
        </form>
    </div>
@stop
