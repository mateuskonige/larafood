@extends('adminlte::page')

@section('title', 'Cadastrar novo plano')

@section('content_header')
    <h1>Cadastrar novo plano</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('plans.store') }}" class="form" method="POST">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="ex.: John Doe">
                </div>
                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="number" step="0.1" name="price" class="form-control" placeholder="ex.: 99,90">
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text" name="description" class="form-control" placeholder="ex.: Breve descrição do plano aqui!">
                </div>
            </div>
            
            <div class="card-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
        </form>
    </div>
@stop