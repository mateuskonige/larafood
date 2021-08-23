@extends('adminlte::page')

@section('title', "Editar detalhe $detail->name do plano $plan->name")

@section('content_header')
    <h1>Editar detalhe {{ $detail->name }} do plano {{ $plan->name }}</h1>
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
