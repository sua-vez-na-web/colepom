@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Visualizar Associado {{$affiliate->first_name}}
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('affiliates.index') }}">Associados</a></li>
                <li class="active">Visualizar de Associados</li>
            </ol>



            <a href="{{route('affiliates.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>



            <div class="panel">
                <div class="panel-body">
                    <dl class="row">
                        <dt class="col-sm-2">Nome</dt>
                        <dd class="col-sm-10">{{$affiliate->first_name}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Data Nasc.</dt>
                        <dd class="col-sm-10">{{$affiliate->birth_of_date}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Empresa</dt>
                        <dd class="col-sm-10">{{$affiliate->company}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Cargo</dt>
                        <dd class="col-sm-10">{{$affiliate->job_post}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Email</dt>
                        <dd class="col-sm-10">{{$affiliate->email}}</dd>
                    </dl>
                </div>
            </div>



            <form action="#" od="post" class="form-inline">
                @csrf
                <button type="button" class="btn btn-success"><i class="fa fa-check"></i> Aprovar: <strong>{{ $affiliate->first_name }}</strong></button>
            </form>
        </div>
    </div>
</div>
@endsection