@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Visualizar Notícia {{$post->title}}
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('posts.index') }}">Notícias</a></li>
                <li class="active">Visualizar Notícias</li>
            </ol>



            <a href="{{route('posts.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>



            <div class="panel">
                <div class="panel-body">
                    <dl class="row">
                        <dt class="col-sm-2">Nome</dt>
                        <dd class="col-sm-10">{{$post->title}}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-2">Descrição</dt>
                        <dd class="col-sm-10">{{$post->body}}</dd>
                    </dl>
                </div>
            </div>

            <form action="{{route('posts.destroy',$post->id)}}" method="post" class="form-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remover: <strong>{{ $post->title }}</strong></button>
            </form>

        </div>
    </div>
</div>
@endsection