@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <span>{{ $error }}</span> <br>       
        @endforeach
    </div>
@endif

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button>
        <span>{{ $message }}</span>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button>
        <span>{{ $message }}</span>
    </div>
@endif
