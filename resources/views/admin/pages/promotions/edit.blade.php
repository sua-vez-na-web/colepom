@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editar Promocao</h3>
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
</div>

@endsection