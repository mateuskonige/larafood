<div class="card-body">
    @include('admin.includes.alert')

    <div class="form-group">
        <label for="title">* Titulo:</label>
        <input type="text" name="title" class="form-control" placeholder="ex.: Banana" value="{{ $product->title ?? old('title') }}">
    </div>

    <div class="form-group">
        <label for="price">* Preço:</label>
        <input type="number" step="0.01" name="price" class="form-control" placeholder="ex.: 9.90" value="{{ $product->price ?? old('price') }}">
    </div>

    <div class="form-group">
        <label for="image">* Imagem:</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label for="description">* Descrição:</label>
        <input type="text" name="description" class="form-control" placeholder="ex.: Descrição do produto" value="{{ $product->description ?? old('description') }}">
    </div>
</div>

<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
</div>
