@extends('adminlte::page')

@section('title', "Editar detalhe $detail->name do plano $plan->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plan.show', $plan->url) }}">{{ $plan->name }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plan.details.index', $plan->url) }}">Detalhes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Editar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Editar detalhe <b>{{ $detail->name }}</b> do plano {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('plan.details.update', [$plan->url, $detail->id]) }}" class="form" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.plans.details._partials.form')
        </form>
    </div>
@stop
