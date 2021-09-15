@extends('admin.layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <h3 class="page-header">
                Cupons
            </h3>



            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('coupons.index') }}">Cupons</a></li>
                <li class="active">Criar cupom</li>
            </ol>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-header">Novo cupom</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('coupons.store') }}" method="post">
                        @csrf

                        @include('admin.pages.coupons._partials.form-create')
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection