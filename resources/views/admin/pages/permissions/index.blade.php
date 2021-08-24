@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Permissões</a></li>
        </ol>
    </nav>

    <br>

    <div class="d-flex justify-content-between">
        <h1>Gestão de permissões</h1>
        <a href="{{ route('permissions.create') }}" class="btn btn-dark"><i class="fa fa-plus"></i> Adicionar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td width="150px">
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-outline-primary">Ver</a>
                                {{-- <a href="{{ route('permission.details.index', $permission->id) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-dark">Editar</a>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
