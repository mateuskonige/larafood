@extends('adminlte::page')

@section('title', "Editar plano $plan->name")

@section('content_header')
    <h1>Editar plano {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('plan.update', $plan->url) }}" class="form" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="ex.: John Doe" value="{{ $plan->name }}">
                </div>
                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="number" step="0.1" name="price" class="form-control" placeholder="ex.: 99,90" value="{{ $plan->price }}">
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text" name="description" class="form-control" placeholder="ex.: Breve descrição do plano aqui!" value="{{ $plan->description}}">
                </div>
            </div>
            
            <div class="card-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
@stop