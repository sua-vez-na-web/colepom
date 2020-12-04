@extends('admin.layouts.admin')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h2>Bem Vindo, {{Auth::user()->name ?? 'Develop' }}</h2>

            @if(Auth::user()->role_id == \App\Models\Role::ADMINISTRATOR)

            <div class="col-md-3 col-sm-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3>Sindicatos</h3>
                        <div class="number" style="display:flex; justify-content:space-between">
                            <i class="fa fa-user fa-4x"></i>
                            <h2>{{$syndicates}}</h2>
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
                            <h2>{{$affiliates}}</h2>
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
                            <h2>{{$partners}}</h2>
                        </div>
                    </div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3>Cupons</h3>
                        <div class="number" style="display:flex; justify-content:space-between">
                            <i class="fa fa-user fa-4x"></i>
                            <h2>{{$promotions ?? 0}}</h2>
                        </div>
                    </div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection