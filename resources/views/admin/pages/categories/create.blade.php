@extends('admin.layouts.admin')

@section('content')    
    <div class="row">        
        <h3 class="page-header">
            Categoria                     
        </h3>        
    </div>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{ route('categories.index') }}">Categorias</a></li>
            <li class="active">Cadastro de Categoria</li>
        </ol>      
    </div>
            
    <div class="row">        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-header">Cadastro de Parceiros</h4>
            </div>
            <div class="panel-body">
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                
                    @include('admin.pages.categories._partials.form')
                </form>
            </div>               
        </div>   
    </div>
@endsection
