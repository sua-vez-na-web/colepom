@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Categoria
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('categories.index') }}">Categorias</a></li>
                <li class="active">Cadastro de Categoria</li>
            </ol>



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
    </div>
</div>
@endsection