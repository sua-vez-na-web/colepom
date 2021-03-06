@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Visualizar Categoria {{$category->name}}
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('categories.index') }}">Categorias</a></li>
                <li class="active">Visualizar de Categorias</li>
            </ol>



            <a href="{{route('categories.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>



            <div class="panel">
                <div class="panel-body">
                    <dl class="row">
                        <dt class="col-sm-2">Nome</dt>
                        <dd class="col-sm-10">{{$category->name}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Descricao</dt>
                        <dd class="col-sm-10">{{$category->description}}</dd>
                    </dl>
                </div>
            </div>




            <form action="{{route('categories.destroy',$category->id)}}" method="post" class="form-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover: <strong>{{ $category->name }}</strong></button>
            </form>


        </div>
    </div>
</div>
@endsection