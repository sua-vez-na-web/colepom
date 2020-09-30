@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <h3 class="page-header">
        Visualizar Promoção {{$promotion->title}}
    </h3>
</div>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a href="{{ route('promotions.index') }}">Promoções</a></li>
        <li class="active">Visualizar Promoções</li>
    </ol>
</div>

<div class="row">
    <a href="{{route('promotions.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
</div>

<div class="row">
    <div class="panel">
        <div class="panel-body">
            <dl class="row">
                <dt class="col-sm-2">Codigo</dt>
                <dd class="col-sm-10">{{$promotion->code}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-2">Title</dt>
                <dd class="col-sm-10">{{$promotion->title}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-2">Descrição</dt>
                <dd class="col-sm-10">{{$promotion->description}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-2">Validade</dt>
                <dd class="col-sm-10">{{date('d/m/Y h:m:s',strToTime($promotion->expiration_date))}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-2">Desconto</dt>
                <dd class="col-sm-10">{{$promotion->discount}}%</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-2">Valor Original</dt>
                <dd class="col-sm-10">R$ {{$promotion->original_value}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-2">Disponíveis</dt>
                <dd class="col-sm-10">{{$promotion->qty_available}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-2">Restantes</dt>
                <dd class="col-sm-10">{{$promotion->qty_remaining}}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-2">Regras de Resgate</dt>
                <dd class="col-sm-10">{{$promotion->redemption_rules}}</dd>
            </dl>
        </div>
    </div>
</div>

<div class="row">
    <img src="{{ Storage::url($promotion->image) }}" alt="">
</div>

<div class="row">
    <div class="col-6">
        <form action="{{route('promotions.destroy',$promotion->id)}}" method="post" class="form-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover: <strong>{{ $promotion->title }}</strong></button>
        </form>
    </div>
</div>
@endsection