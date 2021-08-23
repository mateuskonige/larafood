@extends('adminlte::page')

@section('title', 'Cadastrar novo plano')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
          <li class="breadcrumb-item active" aria-current="page">Criar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Cadastrar novo plano</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('plans.store') }}" class="form" method="POST">
            @csrf

            @include('admin.pages.plans._partials.form')
        </form>
    </div>
@stop
