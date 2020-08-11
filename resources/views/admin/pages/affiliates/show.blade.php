@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <h3 class="page-header">
        Visualizar Associado {{$affiliate->first_name}}
    </h3>
</div>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a href="{{ route('affiliates.index') }}">Associados</a></li>
        <li class="active">Visualizar de Associados</li>
    </ol>
</div>

<div class="row">
    <a href="{{route('affiliates.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
</div>

<div class="row">
    <div class="panel">
        <div class="panel-body">
            <dl class="row">
                <dt class="col-sm-2">Nome Fantasia</dt>
                <dd class="col-sm-10">{{$affiliate->first_name}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-2">Razão Social</dt>
                <dd class="col-sm-10">{{$affiliate->birth_of_date}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-2">CNPJ</dt>
                <dd class="col-sm-10">{{$affiliate->company}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-2">Email</dt>
                <dd class="col-sm-10">{{$affiliate->job_post}}</dd>
            </dl>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <form action="#" od="post" class="form-inline">
            @csrf
            <button type="button" class="btn btn-success"><i class="fa fa-check"></i> Aprovar: <strong>{{ $affiliate->first_name }}</strong></button>
        </form>
    </div>
</div>
@endsection