@extends('adminlte::page')

@section('title', 'Regras')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Regras</a></li>
        </ol>
    </nav>

    <br>

    <div class="d-flex justify-content-between">
        <h1>Gestão de regras</h1>
        <a href="{{ route('rules.create') }}" class="btn btn-dark"><i class="fa fa-plus"></i> Adicionar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('rules.search') }}" method="POST" class="form form-inline">
                @csrf
            
                <div class="form-group">
                    <input type="text" class="form-control" name="filter" placeholder="Nome" value="{{ $filters['filter'] ?? '' }}">
                    <button class="btn btn-dark" type="submit"><i class="fa fa-filter"></i> Filtrar</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rules as $rule)
                        <tr>
                            <td>{{ $rule->name }}</td>
                            <td width="250px">
                                {{-- <a href="{{ route('rules.plans', $rule->id) }}" class="btn btn-outline-info"><i class="fa fa-boxes"></i></a> --}}
                                <a href="{{ route('rules.permissions', $rule->id) }}" class="btn btn-outline-warning"><i class="fa fa-lock"></i></a>
                                <a href="{{ route('rules.show', $rule->id) }}" class="btn btn-outline-primary">Ver</a>
                                <a href="{{ route('rules.edit', $rule->id) }}" class="btn btn-dark">Editar</a>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $rules->appends($filters)->links() !!}
            @else
                {!! $rules->links() !!}
            @endif
        </div>
    </div>
@stop
