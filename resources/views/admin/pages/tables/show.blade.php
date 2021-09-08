@extends('adminlte::page')

@section('title', "Detalhes da mesa | $table->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('tables.index') }}">Mesas</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $table->name }}</a></li>
        </ol>
    </nav>

    <br>

    <h1>Detalhes da mesa <b>{{ $table->name }}</b></h1>
@stop

@section('content')
    <div class="card">
            <div class="card-body">
                <ul>
                    <li><strong>Identificador: </strong>{{ $table->identify }}</li>
                    <li> <strong>Descrição: </strong>{{ $table->description }}</li>
                </ul>
            </div>

            <div class="card-footer">
                @include('admin.includes.alert')

                <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar {{ $table->name }}</button>
                </form>
            </div>
        </form>
    </div>
@stop
