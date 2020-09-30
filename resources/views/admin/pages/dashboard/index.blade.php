@extends('admin.layouts.admin')

@section('content')

<div class="row">
    <h2>Bem Vindo, {{Auth::user()->name ?? 'Develop' }}</h2>
</div>
@if(Auth::user()->role_id == \App\Models\Role::ADMINISTRATOR)
<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3>Sindicatos</h3>
                <div class="number" style="display:flex; justify-content:space-between">
                    <i class="fa fa-user fa-4x"></i>
                    <h2>{{rand(150,200)}}</h2>
                </div>
            </div>
            <div class="panel-body">
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3>Affiliados</h3>
                <div class="number" style="display:flex; justify-content:space-between">
                    <i class="fa fa-user fa-4x"></i>
                    <h2>{{rand(500,700)}}</h2>
                </div>
            </div>
            <div class="panel-body">
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3>Parceiros</h3>
                <div class="number" style="display:flex; justify-content:space-between">
                    <i class="fa fa-user fa-4x"></i>
                    <h2>{{rand(70,150)}}</h2>
                </div>
            </div>
            <div class="panel-body">
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Promoçoes</h3>
                <div class="number" style="display:flex; justify-content:space-between">
                    <i class="fa fa-user fa-4x"></i>
                    <h2>{{rand(40,80)}}</h2>
                </div>
            </div>
            <div class="panel-body">
            </div>
        </div>
    </div>
</div>
@endif
@endsection