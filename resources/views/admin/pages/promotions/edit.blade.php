@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Editar Promocao {{$promotion->title}}
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('promotions.index') }}">Promocaos</a></li>
                <li class="active">Editar de Promocaos</li>
            </ol>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-header">Editar Promocao</h1>
            </div>
            <div class="panel-body">
                {!! Form::model($promotion,['route'=>['promotions.update',$promotion->id],'enctype'=>"multipart/form-data"]) !!}
                <!-- <form action="{{ route('promotions.update',$promotion->id) }}" method="post"> -->
                @method('PUT')
                @csrf
                @include('admin.pages.promotions._partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection