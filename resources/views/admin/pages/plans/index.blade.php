@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Gestão de planos <a href="{{ route('plans.create') }}" class="btn btn-primary">Add</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Tabela de planos
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
                            <td>{{ $plan->price }}</td>
                            <td width="50px">
                                <a href="#" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $plans->links() !!}
        </div>
    </div>
@stop
