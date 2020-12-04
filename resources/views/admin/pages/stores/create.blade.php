@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Estabelecimentos
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('stores.index') }}">Estabelecimentos</a></li>
                <li class="active">Cadastro de Estabelecimentos</li>
            </ol>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-header">Cadastro de Estabelecimentos</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('stores.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @include('admin.pages.stores._partials.form')
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection