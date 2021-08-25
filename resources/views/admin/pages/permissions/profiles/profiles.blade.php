@extends('adminlte::page')

@section('title', "Perfis da permissão $permission->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
          <li class="breadcrumb-item active" aria-current="page">Perfis</a></li>
        </ol>
    </nav>

    <br>

    <div class="d-flex justify-content-between">
        <h1>Perfis da permissão <b>{{ $permission->name }}</b></h1>
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td width="150px">
                                <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger">Desvincular</a>
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
