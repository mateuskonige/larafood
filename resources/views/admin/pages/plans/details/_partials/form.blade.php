<div class="card-body">
    @include('admin.includes.alert')

    <div class="form-group">
        <label for="name">Detalhe:</label>
        <input type="text" name="name" class="form-control" placeholder="ex.: Breve descrição do detalhe do plano aqui!" value="{{ $details->name ?? old('description') }}">
    </div>
</div>

<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</div>
