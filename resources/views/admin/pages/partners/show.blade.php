@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Visualizar Parceiro {{$partner->fantasy_name}}
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('partners.index') }}">Parceiros</a></li>
                <li class="active">Visualizar de Parceiro</li>
            </ol>



            <a href="{{route('partners.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>



            <div class="panel">
                <div class="panel-body">
                    <dl class="row">
                        <dt class="col-sm-2">Nome Fantasia</dt>
                        <dd class="col-sm-10">{{$partner->name}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Razão Social</dt>
                        <dd class="col-sm-10">{{$partner->social_reason}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">CNPJ</dt>
                        <dd class="col-sm-10">{{$partner->cpf_cnpj}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Email</dt>
                        <dd class="col-sm-10">{{$partner->email}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Categoria</dt>
                        <dd class="col-sm-10">{{$partner->category->name}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Telefone</dt>
                        <dd class="col-sm-10">{{$partner->phone}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Telefone Movel</dt>
                        <dd class="col-sm-10">{{$partner->mobile_phone}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Telefone</dt>
                        <dd class="col-sm-10">{{$partner->phone}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Aprovado</dt>
                        <dd class="col-sm-10">{{$partner->is_aprooved ? 'SIM' : 'NÃO'}}</dd>
                    </dl>
                </div>
            </div>

            <div class="col-lg-12" style="display:flex; justify-content:space-between">
                @if(!$partner->is_aprooved)
                <form action="{{route('partners.aproove',$partner->id)}}" od="post" class="form-inline">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aprovar: <strong>{{ $partner->name }}</strong></button>
                </form>
                @endif


                <form action="{{route('partners.destroy',$partner->id)}}" method="post" class="form-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover: <strong>{{ $partner->name }}</strong></button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection