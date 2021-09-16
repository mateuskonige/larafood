@extends('adminlte::page')

@section('title', "Detalhes da regra | $rule->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('rules.index') }}">Perfis</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $rule->name }}</a></li>
        </ol>
    </nav>

    <br>

    <h1>Detalhes do regra <b>{{ $rule->name }}</b></h1>
@stop

@section('content')
    <div class="card">
            <div class="card-body">
                <ul>
                    <li><strong>Nome: </strong>{{ $rule->name }}</li>
                    <li><strong>Descrição: </strong>{{ $rule->description }}</li>
                </ul>
            </div>

            <div class="card-footer">
                @include('admin.includes.alert')

                <form action="{{ route('rules.destroy', $rule->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar {{ $rule->name }}</button>
                </form>
            </div>
        </form>
    </div>
@stop