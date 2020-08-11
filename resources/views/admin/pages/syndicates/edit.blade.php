@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <h3 class="page-header">
        Editar Sindicato {{$syndicate->fantasy_name}}
    </h3>
</div>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a href="{{ route('syndicates.index') }}">Sindicatos</a></li>
        <li class="active">Editar de Sindicatos</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-header">Editar Sindicato</h1>
            </div>
            <div class="panel-body">
                <!-- <form action="{{ route('syndicates.update',$syndicate->id) }}" method="post"> -->
                {!! Form::model($syndicate,['route'=>['syndicates.update',$syndicate->id]]) !!}
                @method('PUT')
                @csrf
                @include('admin.pages.syndicates._partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection