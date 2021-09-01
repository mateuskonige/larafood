@extends('adminlte::page')

@section('title', "Detalhes do usuário | $user->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</a></li>
        </ol>
    </nav>

    <br>

    <h1>Detalhes do usuário <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="card">
            <div class="card-body">
                <ul>
                    <li><strong>Nome: </strong>{{ $user->name }}</li>
                    <li> <strong>E-mail</strong>{{ $user->email }}</li>
                    <li><strong>Empresa: </strong>{{ $user->tenants->name }}</li>
                </ul>
            </div>

            <div class="card-footer">
                @include('admin.includes.alert')

                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar {{ $user->name }}</button>
                </form>
            </div>
        </form>
    </div>
@stop