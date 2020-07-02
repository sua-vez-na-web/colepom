@extends('admin.layouts.admin')

@section('content')    
    <div class="row">        
        <h3 class="page-header">
            Editar Associado {{$affiliate->fantasy_name}}                     
        </h3>        
    </div>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{ route('affiliates.index') }}">Associados</a></li>
            <li class="active">Editar de Associados</li>
        </ol>      
    </div>
            
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-header">Editar Associado</h1>
                </div>
                <div class="panel-body">
                    <form action="{{ route('affiliates.update',$affiliate->id) }}" method="post">
                        @method('PUT')
                        @csrf                    
                        @include('admin.pages.affiliates._partials.form')
                    </form>
                </div>               
            </div>                   
        </div>                
    </div>
@endsection