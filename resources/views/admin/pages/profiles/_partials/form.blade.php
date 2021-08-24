<div class="card-body">
    @include('admin.includes.alert')

    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" class="form-control" placeholder="ex.: John Doe" value="{{ $profile->name ?? old('name') }}">
    </div>
    <div class="form-group">
        <label for="description">Descrição:</label>
        <input type="text" name="description" class="form-control" placeholder="ex.: Breve descrição do profileo aqui!" value="{{ $profile->description ?? old('description') }}">
    </div>
</div>

<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
</div>
