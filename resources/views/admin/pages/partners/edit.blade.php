@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Editar Parcieros {{$partner->fantasy_name}}
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('partners.index') }}">Parcieros</a></li>
                <li class="active">Editar de Parcieross</li>
            </ol>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-header">Editar Parcieros</h4>
                </div>
                <div class="panel-body">
                    <!-- <form action="{{ route('partners.update',$partner->id) }}" method="post"> -->
                    {!! Form::model($partner,['route' => ['partners.update',$partner->id],'enctype'=>'multipart/form-data']) !!}
                    @method('PUT')
                    @csrf
                    @include('admin.pages.partners._partials.form')
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection