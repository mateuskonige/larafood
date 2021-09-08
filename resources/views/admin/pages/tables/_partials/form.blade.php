<div class="card-body">
    @include('admin.includes.alert')

    <div class="form-group">
        <label for="identify">Identificador:</label>
        <input type="text" name="identify" class="form-control" placeholder="ex.: mes1" value="{{ $table->identify ?? old('identify') }}">
    </div>

    <div class="form-group">
        <label for="description">Descrição:</label>
        <input type="text" name="description" class="form-control" placeholder="ex.: Breve descrição" value="{{ $table->description ?? old('description') }}">
    </div>
</div>

<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
</div>
