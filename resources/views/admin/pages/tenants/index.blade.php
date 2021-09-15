@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Empresas</a></li>
        </ol>
    </nav>

    <br>

    <div class="d-flex justify-content-between">
        <h1>Gestão de empresas</h1>
                    <a href="{{ route('tenants.create') }}" class="btn btn-dark"><i class="fa fa-plus"></i> Adicionar</a>


    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('tenants.search') }}" method="POST" class="form form-inline">
                @csrf
            
                <div class="input-group">
                    <input type="text" class="form-control" name="filter" placeholder="Nome" value="{{ $filters['filter'] ?? '' }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-dark" type="submit"><i class="fa fa-filter"></i> Filtrar</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="max-width: 100px;">Imagem</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th class="text-right">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td><img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->name }}" style="max-width: 50px;"></td>
                            <td>{{ $tenant->name }}</td>
                            <td>{{ $tenant->email }}</td>
                            <td class="text-right">
                                <div class="btn-group dropleft">
                                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="{{ route('tenants.show', $tenant->id) }}" class="dropdown-item">Ver</a>
                                        <a href="{{ route('tenants.edit', $tenant->id) }}" class="dropdown-item">Editar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $tenants->appends($filters)->links() !!}
            @else
                {!! $tenants->links() !!}
            @endif
        </div>
    </div>
@stop
