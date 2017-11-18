@if(count($errors->all()) > 0)
    <div class="alert alert-danger fade in alert-dismissable text-center show-alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"
           title="close">×</a>
        @foreach ($errors->all() as $error)
            <strong>{{ $error }}</strong>
        @endforeach
    </div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-danger fade in alert-dismissable text-center show-alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"
           title="close">×</a>
        {{ Session::get('fail') }}
    </div>
@endif