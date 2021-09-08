@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Produtos</a></li>
        </ol>
    </nav>

    <br>

    <div class="d-flex justify-content-between">
        <h1>Gestão de produtos</h1>
        <a href="{{ route('products.create') }}" class="btn btn-dark"><i class="fa fa-plus"></i> Adicionar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
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
                        <th style="max-width: 100px;">Imagem</th>
                        <th>Titulo</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 50px;"></td>
                            <td>{{ $product->title }}</td>
                            <td>R$ {{ number_format($product->price, 2,',','.') }}</td>
                            <td width="200px">
                                <a href="{{ route('products.categories', $product->id) }}" class="btn btn-outline-primary"><i class="fa fa-cart-arrow-down"></i></a>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary">Ver</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-dark">Editar</a>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $products->appends($filters)->links() !!}
            @else
                {!! $products->links() !!}
            @endif
        </div>
    </div>
@stop
