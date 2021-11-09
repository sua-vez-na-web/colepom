@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Editar Depoimento {{$testimonial->name}}
            </h3>

            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('testimonials.index') }}">Depoimento</a></li>
                <li class="active">Editar Depoimento</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-header">Editar Depoimento</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model($testimonial,['route'=>['testimonials.update',$testimonial->id]]) !!}
                    @method('PUT')
                    @csrf
                    @include('admin.pages.testimonials._partials.form')
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection