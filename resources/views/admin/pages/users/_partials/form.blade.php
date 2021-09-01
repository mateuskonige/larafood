<div class="card-body">
    @include('admin.includes.alert')

    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" class="form-control" placeholder="ex.: John Doe" value="{{ $user->name ?? old('name') }}">
    </div>
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" class="form-control" placeholder="ex.: johndoe@example.com" value="{{ $user->email ?? old('email') }}">
    </div>
    <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" name="password" class="form-control" placeholder="Senha">
    </div>
</div>

<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
</div>
