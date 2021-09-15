@extends('adminlte::page')

@section('title', 'Cadastrar nova empresa')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('tenants.index') }}">Empresas</a></li>
          <li class="breadcrumb-item active" aria-current="page">Criar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Cadastrar nova empresa</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('tenants.store') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf

            @include('admin.pages.tenants._partials.form')
        </form>
    </div>
@stop
