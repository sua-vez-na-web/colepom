@extends('admin.layouts.admin')

@section('content')    
    <div class="row">        
        <h3 class="page-header">
            Estabelecimentos                     
        </h3>        
    </div>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{ route('stores.index') }}">Estabelecimentos</a></li>
            <li class="active">Cadastro de Estabelecimentos</li>
        </ol>      
    </div>
            
    <div class="row">        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-header">Cadastro de Estabelecimentos</h4>
            </div>
            <div class="panel-body">
                <form action="{{ route('stores.store') }}" method="post">
                    @csrf
                
                    @include('admin.pages.stores._partials.form')
                </form>
            </div>               
        </div>   
    </div>
@endsection
