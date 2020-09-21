@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <h3 class="page-header">
        Editar Parcieros {{$partner->fantasy_name}}
    </h3>
</div>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a href="{{ route('partners.index') }}">Parcieros</a></li>
        <li class="active">Editar de Parcieross</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-header">Editar Parcieros</h1>
            </div>
            <div class="panel-body">
                <!-- <form action="{{ route('partners.update',$partner->id) }}" method="post"> -->
                {!! Form::model($partner,['route' => ['partners.update',$partner->id]]) !!}
                @method('PUT')
                @csrf
                @include('admin.pages.partners._partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection