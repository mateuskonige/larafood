@extends('adminlte::page')

@section('title', "Permissões do perfil $profile->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
          <li class="breadcrumb-item active" aria-current="page">Permissões</a></li>
        </ol>
    </nav>

    <br>

    <div class="d-flex justify-content-between">
        <h1>Permissões do perfil <b>{{ $profile->name }}</b></h1>
        <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark"><i class="fa fa-plus"></i> Add permissão</a>
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
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
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
