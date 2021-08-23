@extends('adminlte::page')

@section('title', "Cadastrar novo detalhe ao plano $plan->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plan.show', $plan->url) }}">{{ $plan->name }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plan.details.index', $plan->url) }}">Detalhes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Criar</a></li>
        </ol>
    </nav>

    <br>

    <h1>Cadastrar novo detalhe ao plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('plan.details.store', $plan->url) }}" class="form" method="POST">
            @csrf

            @include('admin.pages.plans.details._partials.form')
        </form>
    </div>
@stop
