@extends('adminlte::page')

@section('title', "Categorias disponíveis para o produto $product->title")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
          <li class="breadcrumb-item active" aria-current="page">Categorias</a></li>
        </ol>
    </nav>

    <br>

    <div class="d-flex justify-content-between">
        <h1>Categorias disponíveis para o produto <b>{{ $product->title }}</b></h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.categories.available', $product->id) }}" method="POST" class="form form-inline">
                @csrf
            
                <div class="form-group">
                    <input type="text" class="form-control" title="filter" placeholder="Nome" value="{{ $filters['filter'] ?? '' }}">
                    <button class="btn btn-dark" type="submit"><i class="fa fa-filter"></i> Filtrar</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('products.categories.attach', $product->id) }}" method="POST">
                        @csrf
                        
                        @include('admin.includes.alert')

                        @foreach ($categories as $category)
                            <tr>
                                <td><input type="checkbox" name="categories[]" value="{{ $category->id }}"></td>
                                <td>{{ $category->name }}</td>
                            </tr>
                        @endforeach  
                        
                        <tr>
                            <td>
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
        </div>
    </div>
@stop
