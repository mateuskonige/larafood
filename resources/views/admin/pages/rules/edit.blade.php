@extends('adminlte::page')

@section('title', "Editar regra $rule->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('rules.index') }}">Regras</a></li>
          <li class="breadcrumb-item active" aria-current="page">Editar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Editar regra <b>{{ $rule->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('rules.update', $rule->id) }}" class="form" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.rules._partials.form')
        </form>
    </div>
@stop
