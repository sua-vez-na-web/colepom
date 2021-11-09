@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Notícias
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('posts.index') }}">Notícias</a></li>
                <li class="active">Cadastro de Notícias</li>
            </ol>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-header">Cadastro de Notícias</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('posts.store') }}" method="post">
                        @csrf

                        @include('admin.pages.posts._partials.form')
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection