@extends('admin.layouts.admin')

@section('content')    
    <div class="row">        
        <h3 class="page-header">
            Visualizar Estabelecimento {{$store->name}}                     
        </h3>        
    </div>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{ route('stores.index') }}">Estabelecimentos</a></li>
            <li class="active">Visualizar de Estabelecimento</li>
        </ol>      
    </div>

    <div class="row">
        <a href="{{route('stores.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
    </div>

    <div class="row">
        <div class="panel">        
            <div class="panel-body">
                <dl class="row">
                    <dt class="col-sm-2">Nome</dt>
                    <dd class="col-sm-10">{{$store->name}}</dd>                                          
                </dl>
                <dl class="row">
                    <dt class="col-sm-2">Cidade</dt>
                    <dd class="col-sm-10">{{$store->city}}</dd>                                          
                </dl>
                <dl class="row">
                    <dt class="col-sm-2">Bairro</dt>
                    <dd class="col-sm-10">{{$store->neighborhood}}</dd>                                          
                </dl>
                <dl class="row">
                    <dt class="col-sm-2">Telfone</dt>
                    <dd class="col-sm-10">{{$store->phone}}</dd>                                          
                </dl>                
            </div>            
        </div>     
    </div>

    <div class="row">        
        <div class="col-6">
            <form action="{{route('stores.destroy',$store->id)}}" method="post" class="form-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover: <strong>{{ $store->name }}</strong></button>
            </form>  
        </div>
    </div>
@endsection
                

 