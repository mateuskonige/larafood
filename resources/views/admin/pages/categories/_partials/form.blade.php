<div class="card-body">
    @include('admin.includes.alert')

    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" class="form-control" placeholder="ex.: John Doe" value="{{ $category->name ?? old('name') }}">
    </div>
    <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea name="description" cols="30" rows="5" class="form-control" value="{{ $category->description ?? old('description') }}"></textarea>
    </div>
</div>

<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
</div>
