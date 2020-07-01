@extends('admin.layouts.admin')

@section('content')    
    <div class="row">        
        <h3 class="page-header">
            Editar Estabelecimentos {{$store->name}}                     
        </h3>        
    </div>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{ route('stores.index') }}">Estabelecimentoss</a></li>
            <li class="active">Editar Estabelecimentos</li>
        </ol>      
    </div>
            
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-header">Editar Estabelecimento</h1>
                </div>
                <div class="panel-body">
                    <form action="{{ route('stores.update',$store->id) }}" method="post">
                        @method('PUT')
                        @csrf                    
                        @include('admin.pages.stores._partials.form')
                    </form>
                </div>               
            </div>                   
        </div>                
    </div>
@endsection