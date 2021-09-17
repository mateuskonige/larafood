@extends('adminlte::page')

@section('title', "Usuários disponíveis para o cargo $rule->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('rules.index') }}">Cargos</a></li>
          <li class="breadcrumb-item active" aria-current="page">Usuários</a></li>
        </ol>
    </nav>

    <br>

    <div class="d-flex justify-content-between">
        <h1>Usuários disponíveis para o cargo <b>{{ $rule->name }}</b></h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('rules.users.available', $rule->id) }}" method="POST" class="form form-inline">
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
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('rules.users.attach', $rule->id) }}" method="POST">
                        @csrf
                        
                        @include('admin.includes.alert')

                        @foreach ($users as $user)
                            <tr>
                                <td><input type="checkbox" name="users[]" value="{{ $user->id }}"></td>
                                <td>{{ $user->name }}</td>
                            </tr>
                        @endforeach  
                        
                        <tr>
                            <td>
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $users->appends($filters)->links() !!}
            @else
                {!! $users->links() !!}
            @endif
        </div>
    </div>
@stop
