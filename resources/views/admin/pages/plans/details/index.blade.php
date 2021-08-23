@extends('adminlte::page')

@section('title', "Detalhes do plano $plan->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
          <li class="breadcrumb-item"><a href="{{ route('plan.show', $plan->url) }}">{{ $plan->name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detalhes</a></li>
        </ol>
    </nav>

    <br>

    <h1></h1>

    <div class="d-flex justify-content-between">
        <h1>Detalhes do plano {{ $plan->name }}</h1>
        <a href="{{ route('plan.details.create', $plan->url) }}" class="btn btn-dark"><i class="fa fa-plus"></i> Adicionar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->name }}</td>
                            <td width="150px">
                                <a href="{{ route('plan.show', $plan->url) }}" class="btn btn-outline-primary">Ver</a>
                                <a href="{{ route('plan.edit', $plan->url) }}" class="btn btn-dark">Editar</a>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
        </div>
    </div>
@stop
