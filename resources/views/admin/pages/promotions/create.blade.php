@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <h3 class="page-header">
        Promocao
    </h3>
</div>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a href="{{ route('promotions.index') }}">Promocao</a></li>
        <li class="active">Cadastro de Promocao</li>
    </ol>
</div>

<div class="row">
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
@endsection