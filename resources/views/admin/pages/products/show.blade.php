@extends('adminlte::page')

@section('title', "Detalhes do produto | $product->title")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</a></li>
        </ol>
    </nav>

    <br>

    <h1>Detalhes do produto <b>{{ $product->title }}</b></h1>
@stop

@section('content')
    <div class="card">
            <div class="card-body">
                <ul>
                    <li><img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 100px;"></li>
                    <li><strong>Titulo: </strong>{{ $product->title }}</li>
                    <li> <strong>Flag: </strong>{{ $product->flag }}</li>
                    <li> <strong>Preço: </strong>R$ {{ number_format($product->price, 2,',','.') }}</li>
                    <li><strong>Descrição: </strong>{{ $product->description }}</li>
                </ul>
            </div>

            <div class="card-footer">
                @include('admin.includes.alert')

                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-times-circle"></i> Deletar {{ $product->title }}</button>
                </form>
            </div>
        </form>
    </div>
@stop