@extends('adminlte::page')

@section('title', "Cadastrar novo detalhe ao plano $plan->name")

@section('content_header')
    <h1>Cadastrar novo detalhe ao plano {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('plan.details.store', $plan->url) }}" class="form" method="POST">
            @csrf

            @include('admin.pages.plans.details._partials.form')
        </form>
    </div>
@stop
