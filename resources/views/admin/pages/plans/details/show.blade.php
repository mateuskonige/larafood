@extends('adminlte::page')

@section('title', "Mais sobre o detalhe | $detail->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plan.show', $plan->url) }}">{{ $plan->name }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plan.details.index', $plan->url) }}">Detalhes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Mais</a></li>
        </ol>
    </nav>

    <br>

    <h1>Mais sobre o detalhe <b>{{ $detail->name }}</b></h1>
@stop

@section('content')
    <div class="card">
            <div class="card-body">
                <ul>
                    <li><strong>Nome: </strong>{{ $detail->name }}</li>
                </ul>
            </div>

            <div class="card-footer">
                <form action="{{ route('plan.details.destroy', [$plan->url, $detail->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar {{ $detail->name }}</button>
                </form>
            </div>
        </form>
    </div>
@stop
