@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Editar Sindicato {{$syndicate->fantasy_name}}
            </h3>

            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('syndicates.index') }}">Sindicatos</a></li>
                <li class="active">Editar de Sindicatos</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-header">Editar Sindicato</h4>
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
</div>
@endsection