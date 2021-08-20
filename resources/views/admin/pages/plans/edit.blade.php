@extends('adminlte::page')

@section('title', "Editar plano $plan->name")

@section('content_header')
    <h1>Editar plano {{ $plan->name }}</h1>
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
