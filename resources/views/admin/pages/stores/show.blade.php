@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Visualizar Estabelecimento {{$store->name}}
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('stores.index') }}">Estabelecimentos</a></li>
                <li class="active">Visualizar de Estabelecimento</li>
            </ol>



            <a href="{{route('stores.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>


            <div class="panel">
                <div class="panel-body">
                    <dl class="row">
                        <dt class="col-sm-2">Nome</dt>
                        <dd class="col-sm-10"><img src="{{Storage::url($store->brand) }}" alt="{{$store->name}}" / width="200px" height="200px"></dd>
                    </dl>
                    <dl class=" row">
                        <dt class="col-sm-2">Nome</dt>
                        <dd class="col-sm-10">{{$store->name}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Cidade</dt>
                        <dd class="col-sm-10">{{$store->city}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Endereço</dt>
                        <dd class="col-sm-10">{{$store->address}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Telfone</dt>
                        <dd class="col-sm-10">{{$store->phone}}</dd>
                    </dl>
                </div>
            </div>



            <form action="{{route('stores.destroy',$store->id)}}" method="post" class="form-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover: <strong>{{ $store->name }}</strong></button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection