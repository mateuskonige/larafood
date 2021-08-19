@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Planos</a></li>
        </ol>
    </nav>

    <br>

    <div class="d-flex justify-content-between">
        <h1>Gestão de planos</h1>
        <a href="{{ route('plans.create') }}" class="btn btn-dark">Adicionar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
            
                <div class="form-group">
                    <input type="text" class="form-control" name="filter" placeholder="Nome" value="{{ $filters['filter'] ?? '' }}">
                    <button class="btn btn-dark" type="submit">Filtrar</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>R$ {{ number_format($plan->price, 2,',','.') }}</td>
                            <td width="50px">
                                <a href="{{ route('plan.show', $plan->url) }}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop
