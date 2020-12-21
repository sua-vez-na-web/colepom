@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Editar Usuario {{$user->name}}
            </h3>

            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('users.index') }}">Usuários</a></li>
                <li class="active">Editar de Usuarios</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-header">Editar Usuario</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model($user,['route'=>['users.update',$user->id]]) !!}
                    @method('PUT')
                    @csrf
                    @include('admin.pages.users._partials.form')
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection