@extends('adminlte::page')

@section('title', "Detalhes do plano | $plan->name")

@section('content_header')
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
                <form action="{{ route('plan.destroy', $plan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar {{ $plan->name }}</button>
                </form>
            </div>
        </form>
    </div>
@stop