@extends('adminlte::page')

@section('title', "Detalhes da permissão | $permission->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $permission->name }}</a></li>
        </ol>
    </nav>

    <br>

    <h1>Detalhes da permissão <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
    <div class="card">
            <div class="card-body">
                <ul>
                    <li><strong>Nome: </strong>{{ $permission->name }}</li>
                    <li><strong>Descrição: </strong>{{ $permission->description }}</li>
                </ul>
            </div>

            <div class="card-footer">
                @include('admin.includes.alert')

                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar {{ $permission->name }}</button>
                </form>
            </div>
        </form>
    </div>
@stop