@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Perfis</a></li>
        </ol>
    </nav>

    <br>

    <div class="d-flex justify-content-between">
        <h1>Gestão de perfis</h1>
        <a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fa fa-plus"></i> Adicionar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td width="150px">
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-outline-primary">Ver</a>
                                {{-- <a href="{{ route('profile.details.index', $profile->id) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-dark">Editar</a>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
