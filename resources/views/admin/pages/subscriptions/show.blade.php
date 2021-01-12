@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Detalhes da Assinatura
            </h3>

            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('subscriptions.index') }}">Assinaturas</a></li>
                <li class="active">Visualizar de Assinatura</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Ações em Integrações:
                </div>
                <div class="panel-body">
                    <a href="#" class="btn btn-primary" type="button">
                        <i class="fa fa-envelope-o"></i>
                        Gerar Fatura Asaas
                    </a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Detalhes
                </div>
                <div class="panel-body">
                    <dl class="row">
                        <dt class="col-sm-2">Cliente</dt>
                        <dd class="col-sm-10">{{$subscription->customer->name ?? '----'}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Descricao</dt>
                        <dd class="col-sm-10">{{$subscription->description}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Data Assinatura</dt>
                        <dd class="col-sm-10">{{$subscription->created_at->format('d/m/Y')}}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection