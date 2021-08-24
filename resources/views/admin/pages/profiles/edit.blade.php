@extends('adminlte::page')

@section('title', "Editar perfil $profile->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
          <li class="breadcrumb-item active" aria-current="page">Editar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Editar perfil <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.profiles._partials.form')
        </form>
    </div>
@stop
