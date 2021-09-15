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
                    <li class="active">Editar cupom</li>
                </ol>



                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-header">Editar cupom</h4>
                    </div>
                    <div class="panel-body">
                        @if ($message = session()->has('yes'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session()->get('yes') }}
                            </div>
                        @endif
                        @if ($message = session()->has('no'))
                            <div class="alert alert-danger" role="alert">
                                {{ session()->get('no') }}
                            </div>
                        @endif
                        @if ($cupom->is_used === 1)
                            <div class="alert alert-warning" role="alert">
                                Este cupom ja foi utilizado, não é possivel editar.
                            </div>
                        @endif

                        <form action="{{ route('coupons.update', $cupom->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            @include('admin.pages.coupons._partials.form-edit')
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
