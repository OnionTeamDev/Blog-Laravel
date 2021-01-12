@foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show row col-md-12 mx-auto" role="alert">
        <div class="col-md-10">
            {{$error}}
        </div>
        <button type="button" class="close col-md-2 p-0" data-dismiss="alert" aria-label="Close">
            <span class="mt-2" aria-hidden="true">&times;</span>
        </button>
    </div>
@endforeach
