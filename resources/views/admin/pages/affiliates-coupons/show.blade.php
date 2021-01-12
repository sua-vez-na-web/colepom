@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Detalhe do Cupom {{$affiliatesCoupon->coupon->code ?? ''}}
            </h3>
            @if(!$usable)
            <h4 class="text text-danger">A data limite para resgate do Cupom Expirou.</h4>
            @endif

            @if(!$affiliatesCoupon->coupon->promotion)
            <h4 class="text text-danger">Promoção Excluída do Sistema</h4>
            @endif

            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('affiliates-coupons.index') }}">Cupons Resgatados</a></li>
                <li class="active">Visualizar de Cupon</li>
            </ol>

            <a href="{{route('affiliates-coupons.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>

            <div class="panel">
                <div class="panel-body">
                    <dl class="row">
                        <dt class="col-sm-2">Associado</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->user->name ?? ''}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Email</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->user->email ?? ''}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Telefone</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->user->affiliate->mobile_phone ?? ''}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Data do Cadastro</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->user->created_at->format('d/m/Y H:m')}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Empresa</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->user->affiliate->company}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Cargo</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->user->affiliate->job_post}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Sindicato/Associação</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->user->affiliate->syndicate->name ?? '---'}}</dd>
                    </dl>
                    <hr>
                    <dl class="row">
                        <dt class="col-sm-2">Código do Cupom</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->coupon->code}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Data do Resgate</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->redeem_at->format('d/m/Y H:m')}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Data do Limite de Resgate</dt>
                        <dd class="col-sm-10">{{ $affiliatesCoupon->coupon->promotion ? $affiliatesCoupon->coupon->promotion->redeem_expiration_date->format('d/m/Y H:m') : '---'}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Promoção</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->coupon->promotion->title ?? ''}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Desconto</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->coupon->promotion->discount ?? ''}}%</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Valor Original</dt>
                        <dd class="col-sm-10">R$ {{$affiliatesCoupon->coupon->promotion->original_value ?? ''}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Data de Expiração</dt>
                        <dd class="col-sm-10">{{ $affiliatesCoupon->coupon->promotion ? $affiliatesCoupon->coupon->promotion->expiration_date->format('d/m/Y H:m') : '---' }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Regras</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->coupon->promotion->rules ?? ''}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">CUPOM USADO</dt>
                        <dd class="col-sm-10">{{$affiliatesCoupon->is_used ?'SIM':'NAO'}}</dd>
                    </dl>
                </div>
            </div>

            <div class="col-lg-12" style="display:flex; justify-content:space-between">
                @if(!$affiliatesCoupon->is_used)
                <form action="{{ route('affiliates-coupons.confirm',$affiliatesCoupon->id) }}" method="get" class="form-inline">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Confirmar: <strong>{{ $affiliatesCoupon->coupon->code }}</strong></button>
                </form>
                @endIf
            </div>
        </div>
    </div>
</div>
@endsection