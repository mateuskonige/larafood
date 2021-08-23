@extends('adminlte::page')

@section('title', "Editar plano $plan->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
          <li class="breadcrumb-item active" aria-current="page">Editar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Editar plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('plan.update', $plan->url) }}" class="form" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.plans._partials.form')
        </form>
    </div>
@stop
