@extends('admin.layouts.admin')

@section('content')    
    <div class="row">        
        <h3 class="page-header">
            Visualizar Promocao {{$promotion->title}}                     
        </h3>        
    </div>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{ route('promotions.index') }}">Promocaos</a></li>
            <li class="active">Visualizar de Promocao</li>
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
                    <dt class="col-sm-2">Validade</dt>
                    <dd class="col-sm-10">{{$promotion->due_date}}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-2">Desconto</dt>
                    <dd class="col-sm-10">{{$promotion->amount}}</dd>      
                </dl>
            </div>            
        </div>     
    </div>

    <div class="row">        
        <div class="col-6">
            <form action="{{route('promotions.destroy',$promotion->id)}}" method="post" class="form-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover: <strong>{{ $promotion->code }}</strong></button>
            </form>  
        </div>
    </div>
@endsection
                

 