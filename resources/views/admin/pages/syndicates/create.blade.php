@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Sindicatos
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('syndicates.index') }}">Sindicatos</a></li>
                <li class="active">Cadastro de Sindicatos</li>
            </ol>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-header">Cadastro de Sindicato</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('syndicates.store') }}" method="post">
                        @csrf

                        @include('admin.pages.syndicates._partials.form')
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection