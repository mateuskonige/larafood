@extends('adminlte::page')

@section('title', "Detalhes do plano | $plan->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $plan->name }}</a></li>
        </ol>
    </nav>

    <br>

    <h1>Detalhes do plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
            <div class="card-body">
                <ul>
                    <li><strong>Nome: </strong>{{ $plan->name }}</li>
                    <li> <strong>Preço: </strong>R$ {{ number_format($plan->price, 2,',','.') }}</li>
                    <li><strong>Descrição: </strong>{{ $plan->description }}</li>
                </ul>
            </div>

            <div class="card-footer">
                @include('admin.includes.alert')

                <form action="{{ route('plan.destroy', $plan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar {{ $plan->name }}</button>
                </form>
            </div>
        </form>
    </div>
@stop