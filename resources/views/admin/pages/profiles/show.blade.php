@extends('adminlte::page')

@section('title', "Detalhes do perfil | $profile->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $profile->name }}</a></li>
        </ol>
    </nav>

    <br>

    <h1>Detalhes do perfil <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
    <div class="card">
            <div class="card-body">
                <ul>
                    <li><strong>Nome: </strong>{{ $profile->name }}</li>
                    <li><strong>Descrição: </strong>{{ $profile->description }}</li>
                </ul>
            </div>

            <div class="card-footer">
                @include('admin.includes.alert')

                <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar {{ $profile->name }}</button>
                </form>
            </div>
        </form>
    </div>
@stop