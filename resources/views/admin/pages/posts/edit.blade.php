@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Editar Notícia {{$post->title}}
            </h3>

            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('posts.index') }}">Notícias</a></li>
                <li class="active">Editar Notícia</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-header">Editar Notícia</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model($post,['route'=>['posts.update',$post->id]]) !!}
                    @method('PUT')
                    @csrf
                    @include('admin.pages.posts._partials.form')
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection