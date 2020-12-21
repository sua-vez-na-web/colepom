@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Visualizar Usuario {{$user->name}}
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                <li class="active">Visualizar de Usuarios</li>
            </ol>



            <a href="{{route('users.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>



            <div class="panel">
                <div class="panel-body">
                    <dl class="row">
                        <dt class="col-sm-2">Nome</dt>
                        <dd class="col-sm-10">{{$user->name}}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-2">Email</dt>
                        <dd class="col-sm-10">{{$user->email}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Perfil</dt>
                        <dd class="col-sm-10">{{$user->role->name}}</dd>
                    </dl>
                </div>
            </div>

            <form action="{{route('users.destroy',$user->id)}}" method="post" class="form-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover: <strong>{{ $user->name }}</strong></button>
            </form>

        </div>
    </div>
</div>
@endsection