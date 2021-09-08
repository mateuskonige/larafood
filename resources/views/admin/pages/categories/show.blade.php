@extends('adminlte::page')

@section('title', "Detalhes da categoria | $category->name")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</a></li>
        </ol>
    </nav>

    <br>

    <h1>Detalhes da categoria <b>{{ $category->name }}</b></h1>
@stop

@section('content')
    <div class="card">
            <div class="card-body">
                <ul>
                    <li><strong>Nome: </strong>{{ $category->name }}</li>
                    <li> <strong>URL: </strong>{{ $category->url }}</li>
                    <li><strong>Descrição: </strong>{{ $category->description }}</li>
                </ul>
            </div>

            <div class="card-footer">
                @include('admin.includes.alert')

                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar {{ $category->name }}</button>
                </form>
            </div>
        </form>
    </div>
@stop