@if(session('msg'))
<div class="row">
    <div class="alert alert-success" role="alert">{{ session('msg')}}</div>
</div>
@endif

@if(session('error'))
<div class="row">
    <div class="alert alert-danger" role="alert">{{ session('error')}}</div>
</div>
@endif

@if(session('warning'))
<div class="row my-1">
    <div class="col-lg-12">
        <div class="alert alert-warning alert-dismissible">
            <span class="white-text">{{session('warning')}}
            </span>
        </div>
    </div>
</div>
@endif

@if ($errors->any())
<div class="row my-1">
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Atenção!</h4>
        <p>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </p>
    </div>
</div>

@endif