@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Promocao
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('promotions.index') }}">Promocao</a></li>
                <li class="active">Cadastro de Promocao</li>
            </ol>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-header">Cadastro de Promocao</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('promotions.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @include('admin.pages.promotions._partials.form')
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection