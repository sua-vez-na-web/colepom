@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Editar Estabelecimentos {{$store->name}}
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('stores.index') }}">Estabelecimentos</a></li>
                <li class="active">Editar Estabelecimentos</li>
            </ol>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-header">Editar Estabelecimento</h4>
                </div>
                <div class="panel-body">
                    <!-- <form action="{{ route('stores.update',$store->id) }}" method="post"> -->
                    {!! Form::model($store,['route' => ['stores.update',$store->id],'enctype'=>'multipart/form-data']) !!}
                    @method('PUT')
                    @csrf
                    @include('admin.pages.stores._partials.form')
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection