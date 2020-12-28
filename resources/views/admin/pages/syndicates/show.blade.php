@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Visualizar Sindicato {{$syndicate->fantasy_name}}
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('syndicates.index') }}">Sindicatos</a></li>
                <li class="active">Visualizar de Sindicatos</li>
            </ol>



            <a href="{{route('syndicates.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>



            <div class="panel">
                <div class="panel-body">
                    <dl class="row">
                        <dt class="col-sm-2">Nome Fantasia</dt>
                        <dd class="col-sm-10">{{$syndicate->name}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Presidente</dt>
                        <dd class="col-sm-10">{{$syndicate->president_name}}</dd>
                    </dl>
                    {{-- <dl class="row">
                        <dt class="col-sm-2">Categoria</dt>
                        <dd class="col-sm-10">{{$syndicate->category->name ?? ''}}</dd>
                    </dl> --}}
                    <dl class="row">
                        <dt class="col-sm-2">Site</dt>
                        <dd class="col-sm-10">{{$syndicate->site ?? ''}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Facebook</dt>
                        <dd class="col-sm-10">{{$syndicate->facebook ?? ''}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">CNPJ</dt>
                        <dd class="col-sm-10">{{$syndicate->cpf_cnpj ?? ''}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Email</dt>
                        <dd class="col-sm-10">{{$syndicate->email}}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-2">Aprovado</dt>
                        <dd class="col-sm-10">{{$syndicate->is_aprooved ? 'SIM' : 'NÃO'}}</dd>
                    </dl>
                </div>
            </div>



            <div class="col-lg-12" style="display:flex; justify-content:space-between">


                @if(!$syndicate->is_aprooved)
                <form action="{{route('syndicates.aproove',$syndicate->id)}}" od="post" class="form-inline">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aprovar: <strong>{{ $syndicate->name }}</strong></button>
                </form>
                @endif
                <form action="{{route('syndicates.destroy',$syndicate->id)}}" method="post" class="form-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover: <strong>{{ $syndicate->name }}</strong></button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection