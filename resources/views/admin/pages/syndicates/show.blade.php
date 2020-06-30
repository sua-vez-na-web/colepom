@extends('admin.layouts.admin')

@section('content')    
    <div class="row">        
        <h3 class="page-header">
            Visualizar Sindicato {{$syndicate->fantasy_name}}                     
        </h3>        
    </div>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{ route('syndicates.index') }}">Sindicatos</a></li>
            <li class="active">Visualizar de Sindicatos</li>
        </ol>      
    </div>

    <div class="row">
        <a href="{{route('syndicates.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
    </div>

    <div class="row">
        <div class="panel">        
            <div class="panel-body">
                <dl class="row">
                    <dt class="col-sm-2">Nome Fantasia</dt>
                    <dd class="col-sm-10">{{$syndicate->fantasy_name}}</dd>                                          
                </dl>
                <dl class="row">
                    <dt class="col-sm-2">Razão Social</dt>
                    <dd class="col-sm-10">{{$syndicate->social_reason}}</dd>
                </dl>                
                <dl class="row">
                    <dt class="col-sm-2">CNPJ</dt>
                    <dd class="col-sm-10">{{$syndicate->document}}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-2">Email</dt>
                    <dd class="col-sm-10">{{$syndicate->email}}</dd>      
                </dl>
            </div>            
        </div>     
    </div>

    <div class="row">        
        <div class="col-6">
            <form action="{{route('syndicates.destroy',$syndicate->id)}}" method="post" class="form-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover: <strong>{{ $syndicate->fantasy_name }}</strong></button>
            </form>  
        </div>
    </div>
@endsection
                

 