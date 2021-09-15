@extends('adminlte::page')

@section('title', "Editar empresa $tenant->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('tenants.index') }}">Empresa</a></li>
          <li class="breadcrumb-item active" aria-current="page">Editar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Editar empresa <b>{{ $tenant->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('tenants.update', $tenant->id) }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.pages.tenants._partials.form')
        </form>
    </div>
@stop
